<?php

namespace App\Repositories;

final class PathRepository
{
    /**
     * Get migrations directory
     *
     * @return string
     */
    public static function getMigrationPath(): string
    {
        return 'database/migrations/';
    }

    /**
     * Get factories directory
     *
     * @return string
     */
    public static function getFactoriesPath(): string
    {
        return 'database/factories/';
    }

    /**
     * Get seeders directory
     *
     * @return string
     */
    public static function getSeedersPath(): string
    {
        return 'database/seeders/';
    }

    /**
     * Get migrations directory
     *
     * @return string
     */
    public static function getControllersPath(): string
    {
        return 'src/Http/Controllers/';
    }

    /**
     * Get jobs directory
     *
     * @return string
     */
    public static function getJobsPath(): string
    {
        return 'src/Jobs/';
    }

    /**
     * Get commands directory
     *
     * @return string
     */
    public static function getCommandsPath(): string
    {
        return 'src/Console/Commands/';
    }
}
