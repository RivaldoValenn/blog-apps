<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function scopeWithPostsCount(Builder $query){
        $query->withCount('posts')->orderByDesc('posts_count');
    }
}