<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'tag',
        'content',
        'active',
        'description',
        'images'
    ];

    public function faqs()
    {
        return $this->hasMany( NewsFaq::class);
    }

 
}
