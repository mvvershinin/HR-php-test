<?php


namespace App\Http\Traits;


define('YANDEX_API_URL', 'https://api.weather.yandex.ru/v1/forecast?');
define('LAT', 53.251670);
define('LONG', 34.397655);

trait Yandexable
{
    public static function getFromYandex()
    {
        $key = env('YANDEX_API_KEY');
        $client = new \GuzzleHttp\Client();
        $url = YANDEX_API_URL . '&lat=' . LAT . '&lon=' . LONG . '&lang=en_US&hours=false&limit=1';
        $response = $client->request('GET', $url, [
            'headers' => [
                'X-Yandex-API-Key' => $key,
                'Content-Type' => 'application/json',
            ]
        ]);

        return json_decode((string)$response->getBody());
    }
}