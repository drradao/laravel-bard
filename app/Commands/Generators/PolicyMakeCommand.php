<?php

namespace App\Commands\Generators;

use App\LaravelPackage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Console\PolicyMakeCommand as ConsolePolicyMakeCommand;
use Illuminate\Support\Str;

class PolicyMakeCommand extends ConsolePolicyMakeCommand
{
    /**
     * {@inheritdoc}
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace.'\Policies';
    }

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

    /**
     * {@inheritdoc}
     */
    protected function userProviderModel()
    {
        return Model::class;
    }

    /**
     * {@inheritdoc}
     */
    protected function qualifyModel(string $model)
    {
        $model = ltrim($model, '\\/');

        $model = str_replace('/', '\\', $model);

        $rootNamespace = $this->rootNamespace();

        if (Str::startsWith($model, $rootNamespace)) {
            return $model;
        }

        return is_dir(LaravelPackage::source('Models'))
                    ? $rootNamespace.'Models\\'.$model
                    : $rootNamespace.$model;
    }
}
