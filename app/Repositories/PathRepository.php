<?php

namespace App\Repositories;

final class PathRepository
{
    /**
     * Get migrations directory
     */
    public static function getMigrationPath(): string
    {
        return 'database/migrations/';
    }

    /**
     * Get factories directory
     */
    public static function getFactoriesPath(): string
    {
        return 'database/factories/';
    }

    /**
     * Get seeders directory
     */
    public static function getSeedersPath(): string
    {
        return 'database/seeders/';
    }

    /**
     * Get migrations directory
     */
    public static function getControllersPath(): string
    {
        return 'src/Http/Controllers/';
    }

    /**
     * Get jobs directory
     */
    public static function getJobsPath(): string
    {
        return 'src/Jobs/';
    }

    /**
     * Get commands directory
     */
    public static function getCommandsPath(): string
    {
        return 'src/Console/Commands/';
    }
}
