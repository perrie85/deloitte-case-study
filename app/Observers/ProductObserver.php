<?php

namespace App\Observers;

use App\Models\Category;
use App\Models\Product;

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

    public function updating(Product $product): void
    {
        $category = Category::find($product->category_id);

        $product->sku = strtoupper($category->sku_prefix
            . '-'
            . substr(str_replace(' ', '', $product->name), 0, 2)
            . '-' . rand(10000, 99999));
    }
}
