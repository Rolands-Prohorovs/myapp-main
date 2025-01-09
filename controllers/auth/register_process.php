<?php

use App\Validation\IsUniqueInTable;
use App\Validation\MinLengthRule;
use App\Validation\StringsAreEqual;
use App\Validation\Validator;

function validatePassword(array $data): bool
{
    $validator = new Validator();
    $validator->addRule(new MinLengthRule(2));
    $validator->addRule(new StringsAreEqual($data['confirm_password']));
    $validator->addRule(new IsUniqueInTable($data['email'], 'users.email'));

    return $validator->isValid($data['password']);
}

$isPasswordValid = validatePassword([
    'email' => $_POST['email'],
    'password' => $_POST['password'],
    'confirm_password' => $_POST['confirm_password']
]);


if ($isPasswordValid) {
    $q = <<<MySQL
        INSERT INTO `users` (`name`, `email`, `password`) VALUES 
        (:name, :email, :password );
        MySQL;

    $statement = (new \App\Db())->query($q, [
        'name' => \App\Core::generateRandomName(),
        'email' => $_POST['email'],
        'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
    ]);

    $_SESSION['logged_in'] = true;

    header("Location: dashboard");
    exit();
}

$errors = 'Password has to be 8 chars long, has to be confirmed...';
