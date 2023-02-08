<?php

namespace App\Commands\Generators;

use App\LaravelPackage;
use App\Repositories\PathRepository;
use Illuminate\Database\Console\Factories\FactoryMakeCommand as FactoriesFactoryMakeCommand;
use Illuminate\Support\Str;

class FactoryMakeCommand extends FactoriesFactoryMakeCommand
{
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
    protected function getNamespace($name)
    {
        return LaravelPackage::rootNamespace().trim(implode('\\', array_slice(explode('\\', $name), 0, -1)), '\\');
    }

    /**
     * {@inheritdoc}
     */
    protected function getPath($name)
    {
        $name = (string) Str::of($name)->replaceFirst($this->rootNamespace(), '')->finish('Factory');

        return LaravelPackage::path(PathRepository::getFactoriesPath().str_replace('\\', '/', $name).'.php');
    }
}
