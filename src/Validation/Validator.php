<?php

namespace App\Validation;

class Validator
{

    /**
     * @var PasswordValidationRule[]
     */
    private array $rules;

    public function addRule(PasswordValidationRule $rule): self
    {
        $this->rules[] = $rule;

        return $this;
    }

    public function isValid(string $password): bool
    {
        foreach ($this->rules as $rule) {
            if (!$rule->validate($password)) {
                return false;
            }
        }

        return true;
    }
}