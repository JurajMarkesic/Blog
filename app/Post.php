<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'body', 'views', 'category'
    ];

    public function category()
    {
        return $this->belongsTo('Category', 'id', 'category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps()->withPivot('tag_id');
    }
}
