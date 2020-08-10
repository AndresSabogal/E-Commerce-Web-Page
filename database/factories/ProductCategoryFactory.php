<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\ProductCategory;
use Illuminate\Support\Str;

$factory->define(ProductCategory::class, function (Faker $faker) {
    $productCategory=$faker->randomElement(['ropa','calzado','electrodomesticos','tecnologia','hogar']);
    return [
        'name'=>$productCategory,
        'slug'=>Str::slug($productCategory),
        'description'=>$faker->paragraph,
        'page_title'=>$faker->sentence,
        'meta_description'=>$faker->sentence,
        'featured'=>$faker->boolean,
        'image'=>sprintf('img%s.jpg', $faker->numberBetween(1,5)),
    ];
});
