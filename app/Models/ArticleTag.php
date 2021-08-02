<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleTag extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function articlesAndTags()
    {
        return $this->belongsToMany(Article::class, Tag::class);
    }
}
