<?php

namespace App\Parsers\ComposerJson;

use Illuminate\Support\Str;

class NamespaceMap
{
    /**
     * The namespace map.
     *
     * @var array<int,NamespaceMapEntry>
     */
    public array $entries = [];

    /**
     * Create a new NamespaceMap instance.
     *
     * @param  array<string,string|array<int,string>>  $data
     * @param  bool  $dirOnly
     */
    public function __construct(array $data, bool $dirOnly = true)
    {
        foreach ($data as $namespace => $paths) {
            $this->entries[] = new NamespaceMapEntry($namespace, $paths, $dirOnly);
        }
    }

    /**
     * Get the namespace for the given path.
     *
     * @param  string  $path
     * @return string|null
     */
    public function getPathNamespace(string $path): ?string
    {
        $path = Str::finish($path, '/');

        foreach ($this->entries as $entry) {
            if (in_array($path, $entry->paths)) {
                return $entry->namespace;
            }
        }

        return null;
    }
}
