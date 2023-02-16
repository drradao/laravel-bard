<?php

namespace App\Commands\Generators;

use App\LaravelPackage;
use Illuminate\Foundation\Console\RequestMakeCommand as ConsoleRequestMakeCommand;
use Illuminate\Support\Str;

class RequestMakeCommand extends ConsoleRequestMakeCommand
{
    use Concerns\HasPackageRootNamespace;

    /**
     * {@inheritdoc}
     */
    protected function getPath($name)
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);

        return LaravelPackage::source(str_replace('\\', '/', $name).'.php');
    }
}
