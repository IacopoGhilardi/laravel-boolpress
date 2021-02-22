<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    protected $fillable = [
        'title',
        'subtitle',
        'author',
        'text',
    ];

    //db relationship
    public function infoPost() {
        return $this->HasOne('App\InfoPost');
    }

    public function comments() {
        return $this->HasMany('App\Comment');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag');
    }
}
