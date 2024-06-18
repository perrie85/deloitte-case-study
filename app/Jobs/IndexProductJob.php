<?php

namespace App\Jobs;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Services\ElasticSearchService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class IndexProductJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $params = [
            'index' => config('services.elasticsearch.indexes.products'),
            'id' => $this->product->id,
            'body' => ProductResource::make($this->product),
        ];

        app(ElasticSearchService::class)->index($params);
    }
}
