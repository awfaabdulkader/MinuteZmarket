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
        'base_price',
        'sale_price',
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

    //calcule discount

    public function calculateDiscountedPrice()
    {
        $appliedDiscount = null;
        
        // Check for product-specific discount
        $productDiscount = Discount::active()
            ->whereHas('products', function($query) {
                $query->where('products.id', $this->id);
            })
            ->first();
    
        if ($productDiscount) {
            $appliedDiscount = $productDiscount;
        } else {
            // Check category discount
            $categoryDiscount = Discount::active()
                ->whereHas('categories', function($query) {
                    $query->where('categories.id', $this->category_id);
                })
                ->first();
                
            if ($categoryDiscount) {
                $appliedDiscount = $categoryDiscount;
            } else {
                // Check global discount
                $globalDiscount = Discount::active()
                    ->where('applies_to', 'all')
                    ->first();
                    
                if ($globalDiscount) {
                    $appliedDiscount = $globalDiscount;
                }
            }
        }
    
        // Apply discount if found
        if ($appliedDiscount) {
            $discountedPrice = match($appliedDiscount->type) {
                'percentage' => $this->base_price * (1 - $appliedDiscount->percentage/100),
                'fixed' => max(0, $this->base_price - $appliedDiscount->percentage),
                default => $this->base_price
            };
            $this->sale_price = round($discountedPrice, 2);
            // Attach the discount if not already attached
            if (!$this->discounts()->where('discounts.id', $appliedDiscount->id)->exists()) {
                $this->discounts()->attach($appliedDiscount->id);
            }
        } else {
            $this->sale_price = null;
        }
        
        return $this->sale_price;
    }
    public function discounts()
    {
        return $this->morphToMany(Discount::class, 'applicable', 'discount_applicables');
    }
}
