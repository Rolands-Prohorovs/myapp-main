<?php

namespace App;

class Core
{

    public static function generateRandomName(): string
    {
        $firstNames = ['John', 'Jane', 'Michael', 'Emily', 'David', 'Sarah', 'Chris', 'Jennifer', 'Daniel', 'Jessica'];
        $lastNames = ['Smith', 'Johnson', 'Williams', 'Jones', 'Brown', 'Davis', 'Miller', 'Wilson', 'Moore', 'Taylor'];

        $randomFirstName = $firstNames[array_rand($firstNames)];
        $randomLastName = $lastNames[array_rand($lastNames)];

        return $randomFirstName . ' ' . $randomLastName;
    }

}