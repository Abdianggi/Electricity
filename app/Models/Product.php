<?php

namespace App\Models;

use App\Models\Traits\Product\{ProductScope};
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const IS_ACTIVE_FALSE = 0;
    const IS_ACTIVE_TRUE  = 1;

    public function scopeActive(Builder $builder)
    {
        $builder->where('is_active', self::IS_ACTIVE_TRUE);
    }

    public function scopeInactive(Builder $builder)
    {
        $builder->where('is_active', self::IS_ACTIVE_FALSE);
    }
}
