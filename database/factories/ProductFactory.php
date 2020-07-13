<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {

    $weather = [
        'clear',
        'isolated-clouds',
        'scattered-clouds',
        'overcast',
        'light-rain',
        'moderate-rain',
        'heavy-rain',
        'sleet',
        'light-snow',
        'moderate-snow',
        'heavy-snow',
        'fog'
    ];

    $products = [
        'hat',
        'umbrella',
        'jacket',
        'sweater'
    ];

    $product = $products[$faker->numberBetween(0, count($products) -1)];

    return [
        'weather' => $weather[$faker->numberBetween(0, count($weather) -1)],
        'sku' => strtoupper(substr($product, 0, 3)). '-' .array_search($product, $products),
        'name' => $faker->colorName. ' ' .$product,
        'price' => $faker->randomFloat(2, 0, 10)
    ];
});
