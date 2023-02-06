<?php

namespace App\Commands\Generators;

use App\LaravelPackage;
use Illuminate\Foundation\Console\ModelMakeCommand as ConsoleModelMakeCommand;
use Illuminate\Support\Str;

class ModelMakeCommand extends ConsoleModelMakeCommand
{
    protected static $namespace = 'Models';

    /**
     * {@inheritdoc}
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace.'\Models';
    }

    /**
     * {@inheritdoc}
     */
    protected function rootNamespace()
    {
        return LaravelPackage::rootNamespace();
    }

    /**
     * {@inheritdoc}
     */
    protected function getPath($name)
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);

        return LaravelPackage::source(str_replace('\\', '/', $name).'.php');
    }
}
