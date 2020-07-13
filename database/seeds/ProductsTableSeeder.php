<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Product');

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


        for ($i = 0; $i <= 50; $i++)
        {
            
            $product = $products[$faker->numberBetween(0, count($products) -1)];

            DB::table('products')->insert([
                'weather' => $weather[$faker->numberBetween(0, count($weather) -1)],
                'sku' => strtoupper(substr($product, 0, 3)). '-' .array_search($product, $products),
                'name' => $faker->colorName. ' ' .$product,
                'price' => $faker->randomFloat(2, 0, 10),
                'created_at' => $faker->dateTime('now'),
                'updated_at' => $faker->dateTime('now'),
            ]);
        }
    }
}
