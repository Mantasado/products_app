<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Controllers\CurrentWeatherController;
use App\Http\Resources\Product as ProductResource;

class RecommendProductController extends Controller
{
    public function show($city)
    {
        $weather = new CurrentWeatherController;
        $cityWeather = $weather->getWeather($city);
        $condition = $cityWeather['forecastTimestamps'][0]['conditionCode'];
        $product = Product::where('weather', $condition)->get();
        $collection = ProductResource::collection($product);
        return [
            'city' => $city,
            'current_weather' => $condition,
            'recommended_products' => $collection
        ];
    }
}
