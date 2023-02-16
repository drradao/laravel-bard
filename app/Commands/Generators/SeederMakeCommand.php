<?php

namespace App\Commands\Generators;

use App\LaravelPackage;
use App\Repositories\PathRepository;
use Illuminate\Database\Console\Seeds\SeederMakeCommand as SeedsSeederMakeCommand;
use Illuminate\Support\Str;

class SeederMakeCommand extends SeedsSeederMakeCommand
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
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace.'\Database\Seeders';
    }

    /**
     * {@inheritdoc}
     */
    protected function getPath($name)
    {
        $name = str_replace('\\', '/', Str::replaceFirst($this->rootNamespace(), '', $name));

        return LaravelPackage::path(PathRepository::getSeedersPath().str_replace('\\', '/', $name).'.php');
    }
}
