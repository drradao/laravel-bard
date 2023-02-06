<?php

namespace App\Parsers\ComposerJson;

use Illuminate\Support\Str;

class NamespaceMapEntry
{
    /**
     * The namespace.
     *
     * @var string
     */
    public string $namespace;

    /**
     * The path.
     *
     * @var array<int,string>
     */
    public array $paths;

    /**
     * Create a new NamespaceMapEntry instance.
     *
     * @param string $namespace
     * @param string $path
     * @param bool $dirOnly
     */
    public function __construct(string $namespace, array|string $paths, bool $dirOnly)
    {
        $this->namespace = $namespace;
        $paths = is_string($paths) ? [$paths] : $paths;

        if ($dirOnly) {
            // Ensure that the paths end with a slash.
            $paths = array_map(function ($path) {
                return Str::finish($path, '/');
            }, $paths);
        }

        $this->paths = $paths;
    }
}
