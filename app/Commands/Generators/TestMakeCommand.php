<?php

namespace App\Commands\Generators;

use App\LaravelPackage;
use Illuminate\Foundation\Console\TestMakeCommand as ConsoleTestMakeCommand;

class TestMakeCommand extends ConsoleTestMakeCommand
{
    use Concerns\HasPackageRootNamespace;

    protected function getPath($name)
    {
        $name = str_replace($this->rootNamespace(), '', $name);

        return LaravelPackage::tests(str_replace('\\', '/', $name).'.php');
    }
}
