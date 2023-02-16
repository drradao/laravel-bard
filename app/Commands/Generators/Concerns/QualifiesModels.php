<?php

namespace App\Commands\Generators\Concerns;

use App\LaravelPackage;
use Illuminate\Support\Str;

trait QualifiesModels
{
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
