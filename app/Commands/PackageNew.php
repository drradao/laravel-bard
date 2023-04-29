<?php

namespace App\Commands;

use LaravelZero\Framework\Commands\Command;

class PackageNew extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'pkg:new {name?}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Create a new package';

    public function optionOrAsk(string $option, string $question, mixed $default = null): mixed
    {
        if ($this->option($option)) {
            return $this->option($option);
        }

        return $this->ask($question, $default);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
    }
}
