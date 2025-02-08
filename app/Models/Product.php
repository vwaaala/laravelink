<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['name', 'slug', 'description', 'url', 'thumbnail', 'price', 'status', 'category_id'];
    public $translatable = ['name', 'description'];

    protected $casts = [
        'url' => 'array', // Cast 'url' as an array
    ];

    protected static function booted()
    {
        static::saving(function ($product) {
            // Ensure 'url' is an array and contains 'code' before generating the slug
            if (isset($product->url['code'])) {
                $namePart = Str::slug($product->getTranslation('name', 'en')); // Slugify the English name
                $codePart = Str::slug($product->url['code']); // Slugify the URL 'code'
                $product->slug = "{$namePart}-{$codePart}"; // Combine both parts
            } else {
                // Fallback to only English name if 'url.code' is not set
                $product->slug = Str::slug($product->getTranslation('name', 'en'));
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
