<?php

namespace App\Commands\Generators;

use App\LaravelPackage;
use App\Repositories\PathRepository;
use Illuminate\Database\Console\Seeds\SeederMakeCommand as SeedsSeederMakeCommand;
use Illuminate\Support\Str;

class SeederMakeCommand extends SeedsSeederMakeCommand
{
    use Concerns\HasPackageRootNamespace;

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
        // Remove namespace
        $name = Str::replaceFirst($this->getDefaultNamespace(trim($this->rootNamespace(), '\\')).'\\', '', $name);

        // Replace backslashes with forward slashes
        $name = str_replace('\\', '/', $name);

        return LaravelPackage::path(PathRepository::getSeedersPath().$name.'.php');
    }
}
