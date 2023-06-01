<?php

namespace App\Components;

use GuzzleHttp\Client;

class GetDataHttpClient{

    public $client;


    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://jsonplaceholder.typicode.com/',
            'timeout'  => 2.0,
        ]);
    }


}
