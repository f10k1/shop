<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Number;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'quantity', 'short_description', 'description', 'thumb', 'is_bestseller'];

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

    public function thumb()
    {
        return Storage::url($this->thumb);
    }

    public function badges()
    {
        $badges = [];

        if ($this->isNew()) {
            $badges[] = ['name' => 'New', 'background' => 'bg-green-200'];
        }
        if ($this->is_bestseller) {
            $badges[] = ['name' => 'Bestseller', 'background' => 'bg-blue-200'];
        }

        return $badges;
    }
}
