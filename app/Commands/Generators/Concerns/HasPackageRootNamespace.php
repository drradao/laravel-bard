<?php

namespace App\Commands\Generators\Concerns;

use App\LaravelPackage;

trait HasPackageRootNamespace
{
    protected function rootNamespace()
    {
        return LaravelPackage::rootNamespace();
    }
}
