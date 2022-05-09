<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
       'description',
        'category_id',
        'dimensions',
        'code',
        'reference',
        'stock',
        'price',
        'active'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
