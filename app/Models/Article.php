<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

//    protected $guarded = [];
    protected $fillable = ['slug', 'term', 'excerpt', 'definition'];
    protected $with = ['tag'];

    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }
}
