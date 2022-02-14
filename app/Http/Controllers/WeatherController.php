<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GetWeather;

class WeatherController extends Controller
{
    public function index(Request $request)
    { 
        $weather = app(GetWeather::class)->execute([
            'lat' => $request->lat,
            'lon' => $request->lon,
            'user_ip' => $request->user_ip
        ]);

        return $weather;
    }
}
