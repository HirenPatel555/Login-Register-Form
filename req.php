<?php

// Registertion
session_start();
require_once 'db.php';

if (isset($_POST['register'])) {
    // Trim inputs to avoid spaces
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $role = trim($_POST['role']);

    // Initialize error array
    $errors = [];

    // 1. Check empty fields
    if (empty($name) || empty($email) || empty($password) || empty($role)) {
        $errors[] = "All fields are required!";
    }

    // 2. Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format!";
    }

    // 3. Password length check
    if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters!";
    }
}

if (empty($errors)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $checkEmail = $conn->query("SELECT email FROM users WHERE email = '$email'");
    if ($checkEmail->num_rows > 0) {
        $_SESSION['register_error'] = "Email is already registered!";
        $_SESSION['active_form'] = "register";
    } else {
        $conn->query("INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')");
    }

    header("Location: index.php");
    exit();
}

// Login

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email = '$email'");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];

            if ($user['role'] === 'admin') {
                header("Location: admin_page.php");
            } else {
                header("Location: user_page.php");
            }
            exit();
        }
    }

    $_SESSION['login_error'] = "Incorenct email or password";
    $_SESSION['active_form'] = "login";
    header("Location: index.php");
    exit();
}
