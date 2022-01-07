<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(2)->create();

        Category::create([
            'name' => 'Laptop',
            'slug' => 'laptop'
        ]);
        Category::create([
            'name' => 'Handphone',
            'slug' => 'handpone'
        ]);
        Category::create([
            'name' => 'Headset',
            'slug' => 'headset'
        ]);
        Category::create([
            'name' => 'Mouse',
            'slug' => 'mouse'
        ]);

        Post::factory(10)->create();
    }
}
