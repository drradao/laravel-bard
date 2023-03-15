<?php

namespace App\Commands\Generators\Concerns;

use App\LaravelPackage;
use Illuminate\Support\Str;

trait HasPackageRootNamespace
{
    protected function rootNamespace()
    {
        return LaravelPackage::rootNamespace();
    }

    /**
     * Remove the default namespace from the given name.
     *
     * @param  class-string  $name
     * @return class-string
     */
    protected function removeNamespace(string $name): string
    {
        return Str::replaceFirst($this->getDefaultNamespace(trim($this->rootNamespace(), '\\')).'\\', '', $name);
    }

    /**
     * Convert the namespace to path.
     *
     * @param  class-string  $name
     */
    protected function namespaceToPath($name): string
    {
        return str_replace('\\', '/', $name);
    }
}
