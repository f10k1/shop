<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Number;

class Product extends Model
{
    use HasFactory;

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    protected function price(): Attribute
    {
        return Attribute::make(get: fn (float $price) => Number::currency($price));
    }

    public function isNew()
    {
        return $this->is_new || $this->created_at->diffInDays(Carbon::now()) < 7;
    }
}
