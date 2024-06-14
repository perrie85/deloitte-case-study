<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class ProductService extends BaseService
{
    public function __construct(ProductRepository $repository)
    {
        parent::__construct($repository);
    }

    public function index(): Collection
    {
        return Cache::remember('products', 28800, function () {
            return parent::index();
        });
    }
}
