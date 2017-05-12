<?php

namespace AbysKit\Database\Seeds;

use Illuminate\Database\Seeder;
use AbysKit\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tableSeeders = [
            ['slug' => 'user', 'permission' => 111],
            ['slug' => 'supplier', 'permission' => 222],
            ['slug' => 'translator', 'permission' => 444],
            ['slug' => 'manager', 'permission' => 555],
            ['slug' => 'admin', 'permission' => 777],
            ['slug' => 'super-admin', 'permission' => 999],
        ];

        foreach ($tableSeeders as $tableSeeder) {
            $seeder = new Role();

            foreach ($tableSeeder as $field => $value) $seeder[$field] = $value;
            $seeder ->save();
        }
    }
}
