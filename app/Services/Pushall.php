<?php

namespace App\Services;

use GuzzleHttp\Client;

class Pushall
{
    private $id;
    private $apiKey;

    const URL = 'https://pushall.ru/api.php';

    public function __construct($apiKey, $id)
    {
        $this->id = $id;
        $this->apiKey = $apiKey;
    }

    public function send($title, $text)
    {
        $data = [
            "type" => "self",
            "id" => $this->id,
            "key" => $this->apiKey,
            "text" => $text,
            "title" => $title
        ];

        $client = new Client(['base_uri' => self::URL]);
        return $client->post('', ['form_params' => $data]);
    }
}
