<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;

class Post extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    protected $with = ['category', 'user'];
    
    // public function canIncrementView()
    // {
    //     $key = 'post_viewed_' . $this->id;

    //     if (!Cookie::has($key)) {
    //         Cookie::queue($key, true, 1); 
    //         return true;
    //     }

    //     return false;
    // }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function post_count()
    {
        return $this->posts()->count();
    }
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function likes()
    {
        return $this->belongsToMany(User::class, 'post_like')->withTimestamps();
    }
    public function scopeOrderByLikeCount($query)
    {
        return $query->withCount('likes')->orderBy('likes_count', 'desc');
    }

    public function scopeSearch($query, array $searchTerm)
    {
        $query->when($searchTerm['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%');
            });
        });
    
        $query->when($searchTerm['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });
        $query->when($searchTerm['author'] ?? false, function ($query, $author) {
            return $query->whereHas('user', function ($query) use ($author) {
                $query->where('username', $author);
            });
        });
    }
        
}