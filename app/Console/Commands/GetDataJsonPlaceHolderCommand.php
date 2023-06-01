<?php

namespace App\Console\Commands;

use App\Components\GetDataHttpClient;
use Illuminate\Console\Command;

class GetDataJsonPlaceHolderCommand extends Command
{

    protected $signature = 'get:jsondata'; //php artisan get:jsondata

    protected $description = 'Importing data from jsonPlaceholder';

    public function handle()
    {
        $import = new GetDataHttpClient();
        $response = $import->client->request('GET','posts');
        $data = json_decode($response->getBody()->getContents());
        foreach ($data as $item){
            dd($item);
        }
    }
}
