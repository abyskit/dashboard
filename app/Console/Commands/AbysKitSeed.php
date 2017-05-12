<?php

namespace AbysKit\Console\Commands;

use Illuminate\Console\Command;
use AbysKit\Database\Seeds\AbysKitTablesSeeder;
use AbysKit\Database\Seeds\LocalesTableSeeder;

class AbysKitSeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'abyskit:seed {--locale}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seeding the AbysKit Dashboard database data';

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
        $seedOption = $this->option('locale');

        if($seedOption) {
            $this->info('Seeding: AbysKit\Database\Seeds\LocalesTableSeeder');
            $this->call('db:seed', ['--class' => LocalesTableSeeder::class]);
        } else {
            $this->info('Seeding: AbysKit\Database\Seeds\AbysKitTablesSeeder');
            $this->call('db:seed', ['--class' => AbysKitTablesSeeder::class]);
        }
    }
}
