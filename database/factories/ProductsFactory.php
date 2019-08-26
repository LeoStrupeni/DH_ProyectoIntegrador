<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\Brand;
use App\Category;

use Faker\Generator as Faker;

$categories = Category::all();
$brands = Brand::all();

$factory->define(Product::class, function (Faker $faker) use ($categories, $brands) {
    $filepath = storage_path('images');
    return [
        'name' => $faker->realText(50),
        'description' => $faker->realText(100),
        'price' => $faker->randomFloat(null, 0, 500),
        'graduation' => $faker->randomDigit(),
        'origin' => $faker->country(),
        'year'=> $faker->year(now()),
        'volume' => $faker->randomNumber(3),
        'image' => $faker->image($filepath,640,480, null, false),
        'brand_id' => $brands->shuffle()[0]->id,
        'category_id' => $categories->shuffle()[0]->id
    ];

});
