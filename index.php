<?php

session_start();
$error = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register-error'] ?? ''
];
$activeForm = $_SESSION['active_form'] ?? 'login';

session_unset();

function showError($error)
{
    return !empty($error) ? "<p class='error-message'>$error</p>" : '';
}

function isActiveForm($formName, $activeForm)
{
    return $formName === $activeForm ? 'active' : '';
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="form-box <?= isActiveForm('login', $activeForm) ?>" id="login-form">
            <form action="req.php" method="post">
                <h1>Login</h1>
                <?= showError($error['login']); ?>
                <label for="" class="label">Email</label>
                <input type="text" id="email" name="email" placeholder="Enter Your Email" required>
                <label for="" class="label">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter Your Password" required>
                <button type="submit" name="login">Login</button>
                <p>Don't have an Account? <a href="#" onclick="showForm('register-form')">Register</a></p>
            </form>
        </div>

        <div class="form-box <?= isActiveForm('register', $activeForm) ?>" id="register-form">
            <form action="req.php" method="post">
                <h1>Register</h1>
                <?= showError($error['register']); ?>
                <label for="" class="label">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter Your Name" required>
                <label for="" class="label">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter Your Email" required>
                <label for="" class="label">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter Your Password" required>
                <select name="role" id="" required>
                    <option value="">--Select Role--</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <button type="submit" name="register">Register</button>
                <p>Alreday have an Account? <a href="#" onclick="showForm('login-form')">Login</a></p>
            </form>
        </div>
    </div>

    <script>
        function showForm(fromId) {
            document.querySelectorAll(".form-box").forEach(form => {
                form.classList.remove("active")
            });
            document.getElementById(fromId).classList.add("active");
        }
    </script>
</body>

</html>