<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;


class Product extends Model
{
    use HasFactory;
    protected $table ='products';
    protected $fillable = [
        'title',
        'category_id',
        'price',
    ];

    public function categoria()
    {
        return $this->belongsTo(Category::class);
    }
}
