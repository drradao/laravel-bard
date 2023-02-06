<?php

namespace App;

use App\Parsers\ComposerJson;

class LaravelPackage
{
    /**
     * Get the root path of the application we're working on.
     *
     * @return string
     */
    public static function root(): string
    {
        return getcwd();
    }

    /**
     * Get the path to the application we're working on.
     *
     * @param string $path
     * @return string
     */
    public static function path(string $path): string
    {
        return self::root().'/'.$path;
    }

    /**
     * Get the path to the source directory.
     *
     * @return string
     */
    public static function source(string $path = ''): string
    {
        return self::root().'/src/'.$path;
    }

    /**
     * Get the packages name.
     *
     * @return string
     */
    public static function name(): string
    {
        return app(ComposerJson::class)->name;
    }

    /**
     * Get the package's namespace.
     *
     * @return string
     */
    public static function rootNamespace(): string
    {
        return app(ComposerJson::class)->autoload->psr4->getPathNamespace('src/') ?? 'App\\';
    }
}
