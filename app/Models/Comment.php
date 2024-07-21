<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function isAnswer()
    {
        return !!$this->comment_id;
    }

    public function answers()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
