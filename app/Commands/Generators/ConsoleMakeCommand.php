<?php

namespace App\Commands\Generators;

use App\LaravelPackage;
use App\Repositories\PathRepository;

class ConsoleMakeCommand extends \Illuminate\Foundation\Console\ConsoleMakeCommand
{
    use Concerns\HasPackageRootNamespace;

    protected function getPath($name)
    {
        $name = $this->namespaceToPath($this->removeNamespace($name));

        return LaravelPackage::path(PathRepository::getCommandsPath().$name.'.php');
    }
}
