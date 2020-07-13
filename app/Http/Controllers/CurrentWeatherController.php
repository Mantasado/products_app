<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class CurrentWeatherController extends Controller
{
    public function getWeather($city)
    {
        $response = Http::get('https://api.meteo.lt/v1/places/' .$city. '/forecasts/long-term');

        return $response->json();
    }
}