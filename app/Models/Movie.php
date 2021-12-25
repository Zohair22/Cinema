<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Movie extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $with = ['showTimes', 'comments'];

    public function showTimes() : HasMany
    {
        return $this->hasMany(TimeShow::class, 'movie_id', 'id');
    }

    public function comments() : HasMany
    {
        return $this->hasMany(Comment::class, 'movie_id', 'id');
    }

    public function reservations() : HasMany
    {
        return $this->hasMany(Comment::class, 'movie_id', 'id');
    }

    public function scopeFilter($query, array $filters) : void
    {
        $query->when($filters['search'] ?? false, function ($query, $search)
        {
            return $query->where(
                function ($query) use ($search)
                {
                    return $query
                        ->where('name', 'like', '%'.$search.'%');
                }
            );
        });
    }
}
