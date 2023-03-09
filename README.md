# Bard

**The one that tells the stories of the great artisan**

## Introduction

Some of you, that create packages, might have felt the pain of not having *artisan* at your fingertips... Bard is here to your aid!

Bard **will** implement the same *make* commands as *artisan*, but will publish them to your package's source folder and namespace.

## Installation

Global installation is recommended, so you can use it anywhere.

### Global

```bash
composer global require "drradao/laravel-bard"
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
composer require --dev "drradao/laravel-bard"
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
