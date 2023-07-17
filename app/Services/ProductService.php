<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService
{
    protected $productRepository;

    /**
     * Constructor
     *
     * @param ProductRepository $productRepository
     */
    public function __construct(
        ProductRepository $productRepository
    )
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Handle get product list for datatable
     *
     * @return void
     */
    public function handleProductListForDataTable()
    {
        return $this->productRepository->buildQueryForDataTable();
    }
}