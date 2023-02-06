<?php

namespace App\Parsers;

use App\Parsers\ComposerJson\Autoload;

final class ComposerJson
{
    /**
     * The name of the package.
     *
     * @var string|null
     */
    public ?string $name;

    /**
     * The description of the package.
     *
     * @var string|null
     */
    public ?string $description;

    /**
     * The type of the package.
     *
     * @var string
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
     *
     * @var Autoload|null
     */
    public ?Autoload $autoload = null;

    /**
     * Create a new ComposerJson instance.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->name = $data['name'] ?? null;
        $this->description = $data['description'] ?? null;
        $this->type = $data['type'] ?? 'library';
        $this->license = $data['license'] ?? null;
        $this->autoload = new Autoload($data['autoload']) ?? null;
    }

    /**
     * Load the composer.json file.
     *
     * @param string $path
     * @return static
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

        return new static($data);
    }
}
