<?php

namespace App\Commands\Generators;

use App\LaravelPackage;
use App\Repositories\PathRepository;

class JobMakeCommand extends \Illuminate\Foundation\Console\JobMakeCommand
{
    use Concerns\HasPackageRootNamespace;

    protected function getPath($name)
    {
        $name = $this->namespaceToPath($this->removeNamespace($name));

        return LaravelPackage::path(PathRepository::getJobsPath().$name.'.php');
    }
}
