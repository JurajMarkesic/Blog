<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Tag extends Model
{
    use Searchable;

    protected $fillable = [
        'name'
    ];

    public function posts()
    {
        return $this->belongsToMany('App\Post')->withTimestamps()->withPivot('post_id');
    }

}
