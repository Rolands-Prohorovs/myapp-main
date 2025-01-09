<?php

namespace App\Validation;


class MinLengthRule implements PasswordValidationRule
{
    public function __construct(private int $length)
    {

    }

    public function validate(string $password): bool
    {
        return strlen($password) >= $this->length;
    }
}

class ContainsCapitalLetter implements PasswordValidationRule
{

    public function validate(string $password): bool
    {
        return preg_match('/[A-Z]/', $password);
    }
}

class NotContainsSpace implements PasswordValidationRule
{
    function validate(string $password): bool
    {
        return !preg_match('/\s/', $password);
    }
}

class ContainsNumbers implements PasswordValidationRule
{

    public function validate(string $password): bool
    {
        return preg_match('/\d/', $password);
    }
}

class ContainsSpecialCharacter implements PasswordValidationRule
{

    public function validate(string $password): bool
    {
        return preg_match('/[\!\@\#\$\%\^\&\*\(\)\_\-\+\=]/', $password);
    }
}