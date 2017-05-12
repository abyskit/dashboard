<?php

namespace AbysKit\Database\Seeds;

use Illuminate\Database\Seeder;
use AbysKit\Locale;

class LocalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tableSeeders = [
            ['slug' => 'en', 'name' => 'english'],
            ['slug' => 'ru', 'name' => 'русский']
        ];

        foreach ($tableSeeders as $tableSeeder) {
            $seeder = new Locale();

            foreach ($tableSeeder as $field => $value) $seeder[$field] = $value;
            $seeder->save();
        }
    }
}
