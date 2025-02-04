<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Discount extends Model
{
    protected $fillable = 
    [
        'name', 
        'percentage',
        'type', 
        'start_date',
        'end_date', 
        'is_active',
        'applies_to',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'is_active' => 'boolean'
    ];

    

    public function isValid()
    {
        $now = Carbon::now();
        return $this->is_active &&
            $now->greaterThanOrEqualTo($this->start_date) &&
            $now->lessThanOrEqualTo($this->end_date);
    }


    // Automatically check status when accessing the model
    protected static function booted()
    {
        static::retrieved(function ($discount) {
            if ($discount->is_active && Carbon::now()->greaterThan($discount->end_date)) {
                $discount->is_active = false;
                $discount->save();
            }
        });
    }

    
    protected $dates = ['start_date' , 'end_date'];

    public function products(): MorphToMany
    {
        return $this->morphedByMany(Product::class, 'applicable' , 'discount_applicables');
    }

    public function categories():MorphToMany
    {
        return $this->morphedByMany(Category::class, 'applicable' , 'discount_applicables');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)
                     ->where('start_date', '<=' , Carbon::now())
                     ->where('end_date', '>=' , Carbon::now());
    }


}
