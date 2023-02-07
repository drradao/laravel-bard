<?php

namespace App\Commands\Generators;

use App\LaravelPackage;
use App\Repositories\PathRepository;
use Illuminate\Database\Console\Migrations\MigrateMakeCommand as MigrationsMigrateMakeCommand;

class MigrateMakeCommand extends MigrationsMigrateMakeCommand
{
    /**
     * Get the path to the migration directory.
     *
     * @return string
     */
    protected function getMigrationPath()
    {
        return LaravelPackage::path(PathRepository::getMigrationPath());
    }
}
