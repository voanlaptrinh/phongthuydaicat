<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsFaq extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'question',
        'answer',
        'active',
        'news_id',
    ];

    public function news()
    {
        return $this->belongsTo(News::class);
    }


}
