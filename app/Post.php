<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    protected $fillable = [
        'title',
        'author',
        'text',
    ];

    //db relationship
    public function infoPost() {
        return $this->HasOne('App\InfoPost');
    }
}
