<?php

namespace App\Commands\Generators;

use App\LaravelPackage;
use Illuminate\Foundation\Console\ModelMakeCommand as ConsoleModelMakeCommand;
use Illuminate\Support\Str;

class ModelMakeCommand extends ConsoleModelMakeCommand
{
    use Concerns\HasPackageRootNamespace;

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
    protected function getPath($name)
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);

        return LaravelPackage::source(str_replace('\\', '/', $name).'.php');
    }
}
