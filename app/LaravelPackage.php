<?php

namespace App;

use App\Parsers\ComposerJson;

class LaravelPackage
{
    /**
     * Get the root path of the application we're working on.
     */
    public static function root(): string
    {
        return getcwd() ?: throw new \RuntimeException('Unable to determine the current working directory.');
    }

    /**
     * Get the path to the application we're working on.
     */
    public static function path(string $path): string
    {
        return self::root().'/'.$path;
    }

    /**
     * Get the path to the source directory.
     */
    public static function source(string $path = ''): string
    {
        return self::root().'/src/'.$path;
    }

    /**
     * Get the path to the tests directory.
     */
    public static function tests(string $path = ''): string
    {
        return self::root().'/tests/'.$path;
    }

    /**
     * Get the packages name.
     */
    public static function name(): string
    {
        return app(ComposerJson::class)->name;
    }

    /**
     * Get the package's namespace.
     */
    public static function rootNamespace(): string
    {
        return app(ComposerJson::class)->autoload->psr4->getPathNamespace('src/') ?? 'App\\';
    }
}
