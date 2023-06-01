<?php

namespace App\Components;

use GuzzleHttp\Client;

class ElasticHttpClient{

    public $client;


    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'http://demo_elasticsearch:9200/', // container name must be
            'timeout'  => 2.0,
            'headers' => [
                'Accept' => 'application/json; charset=utf-8'
            ]
        ]);
    }


}
