<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $table = 'product_images';

    protected $fillable = [
        'product_id',
        'image_path',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
