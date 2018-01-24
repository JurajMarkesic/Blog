<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use Searchable;  //makes it searchable with laravel scout

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
