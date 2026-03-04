<?php
require_once 'config.php';

function getWeather($city) {
    $url = API_BASE_URL . "weather?q=" . urlencode($city) . "&appid=" . API_KEY . "&units=" . UNITS;

    $response = @file_get_contents($url);

    if ($response === FALSE) {
        return array('error' => 'Nie udało się połączyć z API');
    }
    
    $data = json_decode($response, true);

    if (!isset($data['cod']) || $data['cod'] != 200) {
        return array('error' => isset($data['message']) ? $data['message'] : 'Nieznany błąd API');
    }

    return array(
        'city' => $data['name'],
        'temperature' => $data['main']['temp'],
        'description' => $data['weather'][0]['description'],
        'humidity' => $data['main']['humidity'],
        'wind_speed' => $data['wind']['speed'],
        'icon' => $data['weather'][0]['icon']
    );
}