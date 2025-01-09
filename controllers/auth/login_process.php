<?php

$loggedIn = false;

$username = $_POST['email'];
$password = $_POST['password'];

$statement = (new \App\Db())->query("SELECT * FROM users WHERE email = :user_email LIMIT 1", [
    'user_email' => $username
]);

$users = $statement->fetch();

if ($users && password_verify($password, $users['password'])) {
    $loggedIn = true;
}

if ($loggedIn) {
    $_SESSION['logged_in'] = true;

    // Redirect the user to the dashboard page
    header("Location: dashboard");
    exit();
}

$error = 'User or password not valid, try again';
