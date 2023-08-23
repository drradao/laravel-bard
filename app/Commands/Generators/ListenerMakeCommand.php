<?php

namespace App\Commands\Generators;

use App\LaravelPackage;
use Illuminate\Support\Str;

class ListenerMakeCommand extends \Illuminate\Foundation\Console\ListenerMakeCommand
{
    use Concerns\HasPackageRootNamespace;

    protected function buildClass($name)
    {
        $event = $this->option('event') ?? '';

        if (! Str::startsWith($event, [
            $this->laravel->getNamespace(),
            $this->rootNamespace(),
            'Illuminate',
            '\\',
        ])) {
            $event = $this->rootNamespace().'Events\\'.str_replace('/', '\\', $event);
        }

        $stub = $this->files->get($this->getStub());

        $stub = $this->replaceNamespace($stub, $name)->replaceClass($stub, $name);

        $stub = str_replace(
            ['DummyEvent', '{{ event }}'], class_basename($event), $stub
        );

        return str_replace(
            ['DummyFullEvent', '{{ eventNamespace }}'], trim($event, '\\'), $stub
        );
    }

    protected function getPath($name)
    {
        $name = str_replace($this->rootNamespace(), '', $name);

        return LaravelPackage::source(str_replace('\\', '/', $name).'.php');
    }
}
