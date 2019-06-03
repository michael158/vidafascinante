<?php

namespace App\Providers;

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(env('ELASTIC_ON')){
            // COMENTEI PARA POUPAR A APLICACAO DE TER QUE FAZER VARIAS REQUISICOES PARA A AMAZON
//            // VERIFICA SE O INDICE EXISTE, SE NAO O CRIA //
//            /** @var Client $client */
//            $client = app(Client::class);
//            $index = ['index' => env('ES_INDEX')];
//
//
//            if(!$client->indices()->exists($index)){
//                $client->indices()->create($index);
//            }

        }

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if(env('ELASTIC_ON')){
            $hosts = [
                env('ELASTIC_HOST'),
//                env('ELASTIC_HOST_NOPORT')
            ];
            // ELASTICSEARCH //
            $this->app->bind(Client::class , function () use($hosts){
                return ClientBuilder::create()->setHosts($hosts)->build();
            });
        }
        

    }
}
