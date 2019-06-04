<?php

namespace App\Services\SearchService;

use Elasticsearch\ClientBuilder;

class ElasticSearchService
{
    protected $client;

    protected $elasticParams = [];
    protected $type;

    public function __construct()
    {
        $hosts = [];
        $hosts[0] = env('ELASTIC_HOST');

        $this->client =  ClientBuilder::create()
            ->setHosts($hosts)
            ->build();


        $this->elasticParams['index'] = env('ES_INDEX');

        if($this->type)
            $this->elasticParams['type'] = $this->type;

    }


    public function search($params)
    {
        $this->elasticParams['body'] = [
            'query' => [
                'bool' => [
                    'should' => $params
                ]
            ]
        ];


        $this->elasticParams['size'] = 8000;
        $data = $this->client->search($this->elasticParams);

        return $data;
    }


    public function create($id,$data)
    {
        try{
            $this->elasticParams['refresh'] = true;
            $this->elasticParams['id'] = $id;
            $this->elasticParams['body'] = $data;
            $this->client->index($this->elasticParams);
        }catch (\Exception $e){
            throw $e;
        }

        return true;
    }


}