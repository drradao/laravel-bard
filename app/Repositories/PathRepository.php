<?php

namespace App\Repositories;

final class PathRepository
{
    /**
     * Get migration directory
     *
     * @return string
     */
    public static function getMigrationPath(): string
    {
        return 'database/migrations/';
    }

    /**
     * Get migrations directory
     *
     * @return string
     */
    public static function getFactoriesPath(): string
    {
        return 'database/factories/';
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
}
