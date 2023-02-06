<?php

use App\Parsers\ComposerJson;

it('can parse the composer.json file', function () {
    // Get json file
    $json = fixture('Composer/composer.json');

    expect($json)->not->toBeEmpty();

    // Parse json file
    $data = json_decode($json, true);

    $composerJson = new ComposerJson($data);

    expect($composerJson)
        ->toBeInstanceOf(ComposerJson::class)
        ->name->not->toBeEmpty();
});


it('can locate root namespace', function () {
    // Get json file
    $json = fixture('Composer/composer.json');

    expect($json)->not->toBeEmpty();

    // Parse json file
    $data = json_decode($json, true);

    $composerJson = new ComposerJson($data);

    // Assert that we have all elements loaded
    expect($composerJson)
        ->autoload->not->toBeNull()
        ->autoload->psr4->not->toBeNull()
        ->autoload->psr4->entries->not->toBeEmpty();

    // Assert that we can locate the root namespace
    expect($composerJson->autoload->psr4->getPathNamespace('src/'))->toBe('Package\\Namespace\\');
});
