<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'login_process.php';
}

?>


<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" >
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #ffffff;
        }

        .form-container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
            color: #333333;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            margin-bottom: 5px;
            font-size: 16px;
            color: #333333;
        }

        .form-group input {
            width: calc(100% - 20px);
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #cccccc;
            font-size: 16px;
            margin-right: 10px;
        }

        .form-group input:focus {
            outline: none;
            border-color: #007bff;
        }

        .forgot-password {
            margin-top: 5px;
            font-size: 14px;
            color: #007bff;
            text-decoration: none;
            align-self: flex-end;
        }

        .submit-button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #ffffff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .submit-button:hover {
            background-color: #0056b3;
        }

        .register-link {
            margin-top: 20px;
            font-size: 14px;
            color: #007bff;
            text-decoration: none;
            text-align: center;
            display: block;
        }
    </style>
</head>
<body class="h-full">

<div class="container">
    <div class="form-container">
        <h2>Sign in to your account</h2>
        <form action="" method="POST" class="space-y-6">
            <div class="form-group">
                <label for="email">Email address</label>
                <input id="email" name="email" type="email" autocomplete="email" required class="rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" autocomplete="current-password" required class="rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <a href="#" class="forgot-password">Forgot password?</a>
            </div>
            <?php if (isset($error)) : ?>
                <p style="color: red"><?= $error ?></p>
            <?php endif ?>
            <div>
                <button type="submit" class="submit-button">Sign in</button>
            </div>
        </form>
        <p class="register-link">
            Not a member?
            <a href="register" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Registration</a>
        </p>
    </div>
</div>

</body>
</html>
