<?php

namespace App\Parsers;

use App\Parsers\ComposerJson\Autoload;

final class ComposerJson
{
    /**
     * The name of the package.
     */
    public ?string $name;

    /**
     * The description of the package.
     */
    public ?string $description;

    /**
     * The type of the package.
     */
    public string $type;

    /**
     * The license of the package.
     *
     * @var string|array<int,string>|null
     */
    public string|array|null $license;

    /**
     * The autoload configuration.
     */
    public ?Autoload $autoload = null;

    /**
     * Create a new ComposerJson instance.
     *
     * @param  array<string,mixed>  $data
     */
    public function __construct(array $data)
    {
        $this->name = $data['name'] ?? null;
        $this->description = $data['description'] ?? null;
        $this->type = $data['type'] ?? 'library';
        $this->license = $data['license'] ?? null;
        $this->autoload = $data['autoload'] ? new Autoload($data['autoload']) : null;
    }

    /**
     * Load the composer.json file.
     */
    public static function load(string $path): static
    {
        $json = file_get_contents($path);

        if ($json === false) {
            throw new \RuntimeException('Unable to load composer.json file.');
        }

        $data = json_decode($json, true);

        if ($data === null) {
            throw new \RuntimeException('Unable to parse composer.json file.');
        }

        return new self($data);
    }
}
