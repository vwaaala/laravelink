<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['name', 'slug', 'description'];
    public $translatable = ['name', 'description'];

    protected static function booted()
    {
        static::saving(function ($category) {
            $category->slug = Str::slug($category->getTranslation('name', 'en'));
        });
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

