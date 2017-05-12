<?php

namespace AbysKit\Console\Commands;

use AbysKit\Providers\AbysKitProvider;
use Illuminate\Console\Command;

class AbysKitInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'abyskit:install {--seed=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the AbysKit Dashboard package';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->call('vendor:publish', ['--provider' => AbysKitProvider::class]);
        $this->info('Migrating the database tables into your application');
        $this->call('migrate');
        $seedOption = $this->option('seed');

        if($seedOption) {
            if($seedOption == 'locale') $this->call('abyskit:seed', ['--locale' => true]);
            elseif($seedOption == 'all') $this->call('abyskit:seed');
        }

    }
}
