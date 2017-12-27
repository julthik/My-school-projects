<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title', 
        'description', 
        'pubDate', 
        'link',
        'id_category',  
    ];

    public function categories() 
    {
        return $this->belongsTo(Category::class);
    }
}
