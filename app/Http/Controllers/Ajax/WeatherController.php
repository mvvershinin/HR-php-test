<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Traits\Yandexable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

define('WEATHER_INNER','layouts.weather_inner');

class WeatherController extends Controller
{
    use Yandexable;

    public function getWeather()
    {
        $out = self::getFromYandex();

        $html = view(WEATHER_INNER,
            ['out' => $out->fact]
        )->render();

        return response()->json([ 'html' => $html ], 200);
    }
}
