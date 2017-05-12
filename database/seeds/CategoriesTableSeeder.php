<?php

namespace AbysKit\Database\Seeds;

use Illuminate\Database\Seeder;
use AbysKit\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tableSeeders = [
            ['slug' => 'tours', 'product' => 1, 'thumbnail' => '/abyskit/img/default_bg.jpg', 'status' => 1, 'category_parent_id' => 0],
            ['slug' => 'hotels', 'product' => 1, 'thumbnail' => '/abyskit/img/default_bg.jpg', 'status' => 1, 'category_parent_id' => 0],
            ['slug' => 'car-rent', 'product' => 1, 'thumbnail' => '/abyskit/img/default_bg.jpg', 'status' => 1, 'category_parent_id' => 0],
            ['slug' => 'yacht-rent', 'product' => 1, 'thumbnail' => '/abyskit/img/default_bg.jpg', 'status' => 1, 'category_parent_id' => 0],
            ['slug' => 'photoshoot', 'product' => 1, 'thumbnail' => '/abyskit/img/default_bg.jpg', 'status' => 1, 'category_parent_id' => 0],
            ['slug' => 'transfer', 'product' => 1, 'thumbnail' => '/abyskit/img/default_bg.jpg', 'status' => 1, 'category_parent_id' => 0],
            ['slug' => 'show', 'product' => 1, 'thumbnail' => '/abyskit/img/default_bg.jpg', 'status' => 1, 'category_parent_id' => 0],
            ['slug' => 'single-room', 'product' => 1, 'thumbnail' => '/abyskit/img/default_bg.jpg', 'status' => 1, 'category_parent_id' => 2],
        ];

        foreach ($tableSeeders as $tableSeeder) {
            $seeder = new Category();

            foreach ($tableSeeder as $field => $value) $seeder[$field] = $value;
            $seeder->save();
        }
    }
}
