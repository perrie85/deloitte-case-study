<?php

namespace App\Services;

use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\ClientBuilder;

class ElasticSearchService
{
    public Client $client;

    public function __construct()
    {
        $this->client = ClientBuilder::create()
            ->setHosts(config('services.elasticsearch.hosts'))
            ->setBasicAuthentication(
                config('services.elasticsearch.username'),
                config('services.elasticsearch.password')
            )
            ->build();
    }

    public function index()
    {
    }
}
