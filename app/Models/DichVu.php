<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DichVu extends Model
{
    use HasFactory;
     protected $fillable = [
        'title',
        'tag',
        'content',
        'description',
        'images',
        'images2'
    ];
    public function faqs()
    {
        return $this->hasMany( DichVuFaq::class);
    }
}
