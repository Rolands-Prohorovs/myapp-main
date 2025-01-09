<?php

namespace App\Validation;

use App\Validation\PasswordValidationRule;
use Exception;

class IsUniqueInTable implements PasswordValidationRule
{

    public function __construct(private string $value, private string $tableColumn)
    {

    }

    public function validate(string $value): bool
    {
        [$table, $column] = explode('.', $this->tableColumn);

        $statement = (new \App\Db())->query("SELECT * FROM $table WHERE $column = :value LIMIT 1", [
            'value' => $this->value
        ]);

        $result = $statement->fetch();

        if ($result) {
            // throw new Exception(sprintf('Value %s already found in %s', $this->value, $this->tableColumn));
            return false;
        }

        return true;
    }
}