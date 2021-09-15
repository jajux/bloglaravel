<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($post) {
           $post->user()->associate(auth()->user()->id);
           $post->category()->associate(request()->category);
        });
    }

    // Relation to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation to Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getTitleAttribute($attribute)
    {
        return Str::title($attribute);
    }
}