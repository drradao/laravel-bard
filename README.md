# bard

**The package generator for Laravel Artisans**

## Introduction

If you create Laravel packages, you know that sometimes you need to generate boilerplate code quickly. bard is here to help!

bard implements the same generator commands as Artisan, but publishes them to your package's source folder and namespace.

## Installation

Global installation is **recommended** so that you can use bard anywhere.

### Global

```bash
composer global require drradao/laravel-bard
```

#### Usage

```bash
bard ...
```

**If you don't have composer's global bin folder in your PATH, you MUST add it.**

Hint: `composer global config bin-dir --absolute`

### Local

If you'd like to use it in a specific project, you can install it as a dev dependency.

```bash
composer require --dev drradao/laravel-bard
```

#### Usage

```bash
./vendor/bin/bard ...
```

## Available Commands

### Generators

- `make:model`
- `make:migration`
- `make:factory`
- `make:controller`
- `make:seeder`
- `make:policy`
- `make:request`
- `make:job`
- `make:command`
- `make:test`
- `make:event`
- `make:listener`

For detailed information on each generator command, refer to the [Laravel documentation](https://laravel.com/docs).
