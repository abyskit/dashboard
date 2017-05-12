<?php

namespace AbysKit\Console\Commands;

use AbysKit\Providers\AbysKitProvider;
use Illuminate\Console\Command;

class AbysKitRefreshMigration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'abyskit:refresh {--seed=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh the AbysKit Dashboard database migration and seed datas';

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
        $this->info('Refreshing the database migrating tables in your application');
        $this->call('migrate:refresh');

        $seedOption = $this->option('seed');

        if($seedOption) {
            if($seedOption == 'locale') $this->call('abyskit:seed', ['--locale' => true]);
            elseif($seedOption == 'all') $this->call('abyskit:seed');
        }
    }
}
