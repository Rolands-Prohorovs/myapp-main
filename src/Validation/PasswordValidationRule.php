<?php

namespace App\Validation;

interface PasswordValidationRule
{
    public function validate(string $password): bool;
}