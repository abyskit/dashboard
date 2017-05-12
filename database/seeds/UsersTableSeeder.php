<?php

namespace AbysKit\Database\Seeds;

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tableSeeders = [
            ['email' => 'abyskit@gmail.com', 'password' => bcrypt('abyskit'), 'role_id' => 6, 'status' => 1]
        ];

        foreach ($tableSeeders as $tableSeeder) {
            $seeder = new User();

            foreach ($tableSeeder as $field => $value) $seeder[$field] = $value;
            $seeder ->save();
        }
    }
}
