<?php

namespace App\Http\Controllers\Front;

use App\Components\ElasticHttpClient;
use App\Http\Controllers\Front;


class ElasticSearchController extends Front{
    public $elasticHttp;

    public function __construct(){
        $this->elasticHttp = new ElasticHttpClient();
    }

    public function writeOne(){
        return $this->elasticHttp->client->request('POST','tutorials/_doc/1',[
            'json' => [
                'title' => 'Java start',
                'description' => 'In this course will learn Java',
                'author' => 'neo',
                'tags' => ['Programming', 'Java']
            ]
        ]);
    }
    public function readOne(){
        return $this->elasticHttp->client->request('GET','tutorials/_doc/1');
    }
    public function readAll(){
        $response = $this->elasticHttp->client->request('GET','tutorials/_search',[
            'json' => [
                "query"=> [
                    "match_all" => (object)[]
                ]
            ]
        ]);
        return $response->getBody()->getContents();
    }

    public function searchInMultiFields() {
        return $this->elasticHttp->client->request('GET','tutorials/_search',[
            'json' => [
                "query"=>[
                    "multi_match" => [
                        "query" => "start java",
                        "fields"=> [
                            "title",
                            "description"
                        ]
                    ]
                ]
            ]
        ]);
    }
}
