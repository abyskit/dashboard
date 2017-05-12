<?php

namespace AbysKit\Database\Seeds;

use Illuminate\Database\Seeder;

class AbysKitTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LocalesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CategoryInfosTableSeeder::class);
    }
}
