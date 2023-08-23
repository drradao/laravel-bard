<?php

namespace App\Commands\Generators;

use App\LaravelPackage;
use Illuminate\Support\Str;

class EventMakeCommand extends \Illuminate\Foundation\Console\EventMakeCommand
{
    use Concerns\HasPackageRootNamespace;

    protected function getPath($name)
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);

        return LaravelPackage::source(str_replace('\\', '/', $name).'.php');
    }
}
