<?php

namespace App\Observers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class ProductObserver
{
    public function creating(Product $product): void
    {
        $category = Category::find($product->category_id);

        $product->sku = strtoupper($category->sku_prefix
            . '-'
            . substr(str_replace(' ', '', $product->name), 0, 2)
            . '-' . rand(10000, 99999));
    }

    public function created(Product $product): void
    {
        Cache::forget('products');
    }

    public function updating(Product $product): void
    {
        $category = Category::find($product->category_id);

        $product->sku = strtoupper($category->sku_prefix
            . '-'
            . substr(str_replace(' ', '', $product->name), 0, 2)
            . '-' . rand(10000, 99999));
    }

    public function updated(Product $product): void
    {
        Cache::forget('products');
    }

    public function deleted(Product $product): void
    {
        Cache::forget('products');
    }
}
