<?php

namespace App\Parsers\ComposerJson;

class Autoload
{
    /**
     * The PSR-4 autoload paths.
     *
     * @var NamespaceMap|null
     */
    public ?NamespaceMap $psr4 = null;

    /**
     * Create a new Autoload instance.
     *
     * @param  array<string,mixed>  $data
     */
    public function __construct(array $data)
    {
        if (isset($data['psr-4'])) {
            $this->psr4 = new NamespaceMap($data['psr-4']);
        }
    }
}
