<?php

namespace App\Services\ElasticSearch;

use Elasticsearch\Client;
use Illuminate\Foundation\Testing\HttpException;

class ElasticSearchService
{

    protected $elasticParams = [];
    private $client;
    protected $type;

    public function __construct()
    {
        if (env('ELASTIC_ON')) {
            $this->client = app()->make(Client::class);
            $this->elasticParams['index'] = env('ES_INDEX');
            if ($this->type)
                $this->elasticParams['type'] = $this->type;
            else
                throw new \Exception('Type on Elasticsearch service not defined');
        }
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

    /**
     * Metodo responsável por criar o documento no indice;
     * @param $data
     * @return bool
     */
    public function create($data, $id)
    {
        if (env('ELASTIC_ON')) {
            $this->elasticParams['refresh'] = true;
            $this->elasticParams['id'] = $id;
            $this->elasticParams['body'] = $data;
            $this->client->create($this->elasticParams);
        }
        return true;
    }

    public function update($data, $id)
    {
        if (env('ELASTIC_ON')) {
            $this->elasticParams['id'] = $id;
            if (!$this->client->exists($this->elasticParams))
                throw new HttpException('Client not Found');
            $this->elasticParams['refresh'] = true;
            $this->elasticParams['body']['doc'] = $data;
            $this->client->update($this->elasticParams);
        }

        return true;
    }

    /**
     * Deleta o indice do documento
     * @param $id
     * @return bool
     */
    public function destroy($id)
    {
        if (env('ELASTIC_ON')) {
            $this->elasticParams['id'] = $id;
            if (!$this->client->exists($this->elasticParams))
                throw new HttpException('Client not Found');
            $this->elasticParams['refresh'] = true;
            $this->client->delete($this->elasticParams);
        }
        return true;
    }


}