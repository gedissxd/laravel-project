<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Maker;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Tag;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $tags = Tag::factory(60)->create();
        
        User::factory(50)->has(Maker::factory()->has(Product::factory(20)))->create();

        // Attach random tags to each product
        foreach (Product::all() as $product) {
            $product->tags()->attach($tags->random(rand(1, 3)));
        }
    }
}
