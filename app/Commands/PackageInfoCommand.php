<?php

namespace App\Commands;

use App\LaravelPackage;
use LaravelZero\Framework\Commands\Command;

class PackageInfoCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'pkg:info';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Display the information gathered from the package.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->line('Package Name: '.LaravelPackage::name());
        $this->line('Package Namespace: '.LaravelPackage::rootNamespace());

        return self::SUCCESS;
    }
}
