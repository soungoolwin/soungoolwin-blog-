<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EngBlog extends Model
{
    use HasFactory;
    protected $with = ['author','category','comments'];

    public function scopeFilter($query, $filter, $search=null)
    {
        $query->when($filter['category']??false, function ($query, $slug) {
            $query->whereHas('category', function ($query) use ($slug) {
                $query->where('name', $slug);
            });
        });
        $query->when($filter['author']??false, function ($query, $username) {
            $query->whereHas('author', function ($query) use ($username) {
                $query->where('username', $username);
            });
        });
        $query->when($search??false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', '%'.$search.'%')
                ->orWhere('body', 'LIKE', '%'.$search.'%');
            });
        });
        $query->when($filter['search']??false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', '%'.$search.'%')
                ->orWhere('body', 'LIKE', '%'.$search.'%');
            });
        });
    }
    
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function comments()
    {
        return $this->hasMany(Ecomment::class);
    }

    public function likers()
    {
        return $this->belongsToMany(User::class, 'eblog_user');
    }

    //These like and unlike function is as a helper function for Blog controller. This function is very simple. This is for attach and detach for pivote table.
    public function like()
    {
        $this->likers()->attach(auth()->id());
    }
    public function unlike()
    {
        $this->likers()->detach(auth()->id());
    }
}
