<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{

    protected $fillable= ['image'];

    use HasFactory, SoftDeletes;


    public function product():HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function getProductCountAttribute()
{
    return $this->product()->count();
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
