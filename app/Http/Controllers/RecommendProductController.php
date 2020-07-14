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

        //get json from API
        $cityWeather = $weather->getWeather($city);

        //check if a valid city name was submited
        if(empty($cityWeather))
        {
            return 'Invalid city name';
        }
        
        $condition = $cityWeather['forecastTimestamps'][0]['conditionCode'];
        
        //check if getting a valid weather condition
        if ($condition == 'na')
        {
            return 'Unable to get current weather condition';
        }
        
        //get products from database that match weather condition
        $product = Product::where('weather', $condition)->get();

        //restructor recommended products array
        $collection = ProductResource::collection($product);

        return [
            'city' => $city,
            'current_weather' => $condition,
            'recommended_products' => $collection
        ];
    }
}
