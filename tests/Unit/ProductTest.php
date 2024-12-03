<?php
use App\Models\Maker;
use App\Models\Product;

test('it belongs to maker', function () {
    $maker = Maker::factory()->create();
    $product_listing = Product::factory()->create([
        'maker_id' => $maker->id,
    ]);

    expect($product_listing->maker->is($maker))->toBeTrue();
});
test('can have tags', function ()
{
    $product_listing = Product::factory()->create();
    $product_listing->tag('name');
    expect($product_listing->tags)->toHaveCount(1);
});