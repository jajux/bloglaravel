<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
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
}