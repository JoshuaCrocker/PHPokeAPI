<?php

namespace PokeAPI;

class Request
{
    private $url = 'http://pokeapi.co/';
    private $response;

    public function __construct($url)
    {
        $curl = curl_init($this->url.$url);
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
        ]);
        $this->response = json_decode(curl_exec($curl));
        curl_close($curl);
    }

    public function getResponse()
    {
        return $this->response;
    }
}
