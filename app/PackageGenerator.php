<?php

namespace App;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class PackageGenerator
{
    protected string $packageDirectory;

    protected array $manipulatedProperties = [];

    public function __construct(
        protected string $vendor,
        protected string $name,
        protected string $author,
        protected ?string $email = null,
        protected ?string $description = null,
        protected string $license = 'MIT',
    ) {
        //
    }

    public function validate(): ?array
    {
        $rules = [
            'vendor' => 'required',
            'name' => 'required',
            'author' => 'required',
        ];

        $validator = validator($this->toArray(), $rules);

        if ($validator->fails()) {
            return $validator->errors()->toArray();
        }

        return null;
    }

    protected function cachedManipulation(string $key, \Closure $callback): mixed
    {
        if (! isset($this->manipulatedProperties[$key])) {
            $this->manipulatedProperties[$key] = $callback();
        }

        return $this->manipulatedProperties[$key];
    }

    public function getStudlyVendor(): string
    {
        return $this->cachedManipulation(__FUNCTION__, fn() => Str::studly($this->vendor));
    }

    public function getLowerVendor(): string
    {
        return $this->cachedManipulation(__FUNCTION__, fn() => Str::lower($this->vendor));
    }

    public function getStudlyName(): string
    {
        return $this->cachedManipulation(__FUNCTION__, fn() => Str::studly($this->name));
    }

    public function getSnakeName(): string
    {
        return $this->cachedManipulation(__FUNCTION__, fn() => Str::snake($this->name));
    }

    public function getPackageFolderName(): string
    {
        return $this->cachedManipulation(__FUNCTION__, fn() => Str::snake($this->name));
    }

    public function getPackageName(): string
    {
        return $this->cachedManipulation(__FUNCTION__, fn() => $this->getLowerVendor().'/'.$this->getSnakeName());
    }

    public function getNamespace(): string
    {
        return $this->cachedManipulation(__FUNCTION__, fn() => $this->getStudlyVendor().'\\'.$this->getStudlyName());
    }

    /**
     * Generate package.
     *
     * @param  string $directory The directory to generate the package in.
     */
    public function generate(string $directory): void
    {
        $this->packageDirectory = rtrim($directory, '/').'/'.$this->getPackageFolderName();

        $this->createPackageDirectory();
        $this->createComposerJson();
        $this->scaffoldDirectories();
    }

    /**
     * Create a directory.
     *
     * @param  string $directory The directory to create.
     */
    protected function createDirectory(string $directory, $absolute = false): void
    {
        if (! $absolute) {
            $directory = $this->packageDirectory.'/'.ltrim($directory, '/');
        }

        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }
    }

    /**
     * Retrieve path within package directory.
     */
    public function getPath(string $path): string
    {
        return $this->packageDirectory.'/'.$path;
    }

    /**
     * Create the root directory.
     */
    protected function createPackageDirectory(): void
    {
        $this->createDirectory($this->packageDirectory, true);
    }

    /**
     * Create the composer.json file.
     */
    protected function createComposerJson(): void
    {
        $composerJsonPath = $this->getPath('composer.json');

        $composerData = [
            'name' => $this->getPackageName(),
            'description' => $this->description,
            'license' => $this->license,
            'homepage' => 'https://github.com/'.$this->getPackageName(),
            'authors' => [
                [
                    'name' => $this->author,
                ],
            ],
            'autoload' => [
                'psr-4' => [
                    $this->getNamespace().'\\' => 'src/',
                ],
            ],
            'autoload-dev' => [
                'psr-4' => [
                    $this->getNamespace().'\\Tests\\' => 'tests/',
                ],
            ],
            'extra' => [
                'laravel' => [
                    'providers' => [
                        $this->getNamespace().'\\'.$this->getStudlyName().'ServiceProvider',
                    ],
                ],
            ],
        ];

        if ($this->email) {
            $composerData['authors'][0]['email'] = $this->email;
        }

        // Load the template file.
        $composer = file_get_contents(__DIR__.'/../package-stubs/composer.json');
        $composer = json_decode($composer, true);

        // Merge the template with the data.
        $composer = array_merge($composer, $composerData);

        // Remove empty values.
        $composer = array_filter($composer, fn($value) => ! is_null($value));

        // Save the file.
        file_put_contents($composerJsonPath, json_encode($composer, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }

    /**
     * Scaffold the directories.
     */
    protected function scaffoldDirectories(): void
    {
        $directories = [
            'src' => null,
            'tests' => [
                'Unit' => null,
                'Feature' => null,
            ],
            'config' => null,
        ];

        $paths = Arr::dot($directories);

        foreach ($paths as $path => $value) {
            $directory = Str::replace('.', '/', $path);

            $this->createDirectory($directory);
        }
    }

    public function toArray(): array
    {
        return [
            'vendor' => $this->vendor,
            'name' => $this->name,
            'author' => $this->author,
        ];
    }
}
