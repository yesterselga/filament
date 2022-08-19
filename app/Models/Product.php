<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Permission\Traits\HasRoles;

class Product extends Model
{
     use HasFactory, HasRoles;

     protected $guarded = [];

     protected $casts = [
          'tags' => 'array',
          'category' => 'array',
     ];

     public function branch(): BelongsTo
     {
          return $this->belongsTo(Branch::class, 'brand_id');
     }

     public function categories(): BelongsToMany
     {
          return $this->belongsToMany(Category::class, 'categories', 'shop_product_id', 'id');
     }
}
