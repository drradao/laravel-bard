<?php

namespace App\Commands\Generators;

use App\LaravelPackage;
use Illuminate\Foundation\Console\RequestMakeCommand as ConsoleRequestMakeCommand;
use Illuminate\Support\Str;

class RequestMakeCommand extends ConsoleRequestMakeCommand
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
    protected function getPath($name)
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);

        return LaravelPackage::source(str_replace('\\', '/', $name).'.php');
    }
}
