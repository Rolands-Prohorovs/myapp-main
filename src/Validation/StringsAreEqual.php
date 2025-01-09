<?php

namespace App\Validation;

readonly class StringsAreEqual implements PasswordValidationRule
{
    public function __construct(
        private string $string
    ) {
    }

    public function validate(string $password): bool
    {
        return $this->string === $password;
    }
}