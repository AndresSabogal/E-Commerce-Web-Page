<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Product;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    $product=$faker->sentence(2);
    return [
        'name'=>$product,
        'slug'=>Str::slug($product),
        'description'=>$faker->paragraph,
        'price'=>$faker->numberBetween($min=30000,$max=100000),
        'page_title'=>$faker->sentence,
        'meta_description'=>$faker->sentence,
        'featured'=>$faker->boolean,
        'image'=>sprintf('img%s.jpg', $faker->numberBetween(1,5)),
        'status'=>$faker->randomElement(['disponible','agotado','promocion']),
        'habdis'=>$faker->randomElement(['habilitado','deshabilitado']),
    ];
});
