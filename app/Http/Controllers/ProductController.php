<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\SearchRequest;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(private readonly ProductService $productService)
    {
    }

    public function index()
    {
        return $this->successResponse(ProductResource::collection($this->productService->index()));
    }

    public function store(StoreRequest $request)
    {
        return $this->successResponse(ProductResource::make($this->productService->store($request->validated())));
    }

    public function show(int $id)
    {
        return $this->successResponse(ProductResource::make($this->productService->show($id)));
    }

    public function update(UpdateRequest $request, int $id)
    {
        return $this->successResponse(ProductResource::make($this->productService->update($id, $request->validated())));
    }

    public function search(SearchRequest $request)
    {
        return $this->successResponse($this->productService->search($request->validated()));
    }
}
