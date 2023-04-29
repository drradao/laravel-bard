<?php

use App\PackageGenerator;

use function PHPUnit\Framework\assertDirectoryExists;
use function PHPUnit\Framework\assertFileExists;

uses()->group('unit', 'package-generator');

test('package can be generated', function () {
    $generator = new PackageGenerator(
        vendor: 'vendor',
        name: 'package',
        author: 'John Doe',
        email: 'jdoe@example.com'
    );

    // Create a temporary directory to generate the package in
    $directory = tempnam(sys_get_temp_dir(), 'pkg');

    // Remove the file and create a directory instead
    unlink($directory);
    mkdir($directory);

    // Generate the package
    $generator->generate($directory);

    // Assert that the package directory exists
    assertDirectoryExists($directory.'/package');

    // Assert that the composer.json file exists
    assertFileExists($directory.'/package/composer.json');

    echo $directory;

    // Remove the temporary directory
    // rmdir($directory.'/package');
});
