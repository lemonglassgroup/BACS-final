<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

//    protected $guarded = [];
    protected $fillable = ['slug', 'term', 'excerpt', 'definition'];
    protected $with     = ['tag'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                $query->where('term', 'like', '%' . $search . '%')
                ->orWhere('definition', 'like', '%' . $search . '%')
            )
        );

        $query->when($filters['tag'] ?? false, fn($query, $tag) =>
            $query->whereHas('tag', fn($query) =>
                $query->where('slug', $tag)
            )
        );
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }
}
