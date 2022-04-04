<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'content', 'user_id', 'post_type'];
    /**
     * Authors relationship method
     * 1 to 1 (One post belongs to one Author)
     */
    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
