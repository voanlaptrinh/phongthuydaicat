<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongThuy extends Model
{
    use HasFactory;
      protected $fillable = [
        'title',
        'tag',
        'content',
        'description',
        'images'
    ];
    
 public function faqs()
    {
        return $this->hasMany( PhongThuyFaq::class);
    }
}
