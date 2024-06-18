<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class ProductService extends BaseService
{
    public function __construct(
        ProductRepository $repository,
        private readonly ElasticSearchService $elasticSearchService
    ) {
        parent::__construct($repository);
    }

    public function index(): Collection
    {
        return Cache::remember('products', 28800, function () {
            return parent::index();
        });
    }

    public function search(array $fields)
    {
        $searchBody = [
            'index' => config('services.elasticsearch.indexes.products'),
            'body'  => [
                'query' => [
                    'bool' => [
                        'must' =>
                        array_map(function ($key, $value) {
                            return [
                                'match' => [
                                    $key => $value
                                ]
                            ];
                        }, array_keys($fields), $fields)

                    ]
                ]
            ]
        ];

        $response = $this->elasticSearchService->search($searchBody);

        return array_map(
            function ($product) {
                return $product['_source'];
            },
            $response['hits']['hits']
        );
    }
}
