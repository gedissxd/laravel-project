<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Tag;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User::factory(50)->create();

        $tags = Tag::factory(60)->create();

        foreach (Product::factory(1000)->create() as $product) {
            $product->tags()->attach($tags->random(rand(1, 3)));
        }
    }
}
