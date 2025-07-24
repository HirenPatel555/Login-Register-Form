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
        <div class="form-box active" id="login-form">
            <form action="">
                <h1>Login</h1>
                <label for="" class="label">Email</label>
                <input type="text" id="email" name="email" placeholder="Enter Your Email" required>
                <label for="" class="label">Password</label>
                <input type="text" id="password" name="password" placeholder="Enter Your Password" required>
                <button type="submit" name="login">Login</button>
                <p>Don't have an Account? <a href="#">Register</a></p>
            </form>
        </div>

        <div class="form-box" id="register-form">
            <form action="">
                <h1>Register</h1>
                <label for="" class="label">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter Your Name" required>
                <label for="" class="label">Email</label>
                <input type="text" id="email" name="email" placeholder="Enter Your Email" required>
                <label for="" class="label">Password</label>
                <input type="text" id="password" name="password" placeholder="Enter Your Password" required>
                <select name="role" id="" required>
                    <option value="">--Select Role--</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <button type="submit" name="Register">Register</button>
                <p>Alreday have an Account? <a href="#">Login</a></p>
            </form>
        </div>
    </div>

</body>

</html>