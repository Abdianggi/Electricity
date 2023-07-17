<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class ProductRepository
{
    private $product;

    /**
     * Constructor
     *
     * @param Product $product
     */
    public function __construct(
        Product $product
    )
    {
        $this->product = $product;
    }

    /**
     * Builder for datatable
     *
     * @return Builder
     */
    public function buildQueryForDataTable(): Builder
    {
        return $this->product
                    ->latest();
    }
}