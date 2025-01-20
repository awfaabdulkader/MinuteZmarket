<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Product extends Model
{
    protected $fillable = 
    [
        'slug',
        'prix',
        'stock',
        'category_id',
        'image_url'
    ];


    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }


    public function translations():MorphMany
    {
        return $this->morphMany(Translation::class , 'translatable');
    }

    public function getTranslation(string $languageCode)
    {
        return $this->translations()->where('language_code' , $languageCode)->first();
    }
}
