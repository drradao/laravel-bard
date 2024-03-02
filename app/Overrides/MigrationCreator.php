<?php

namespace App\Overrides;

class MigrationCreator extends \Illuminate\Database\Migrations\MigrationCreator
{
    protected function ensureMigrationDoesntAlreadyExist($name, $migrationPath = null)
    {
        // Disable the default behavior to prevent requiring user code into app
        // No duplicate migration check for now
    }
}
