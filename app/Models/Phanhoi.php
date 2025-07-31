<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phanhoi extends Model
{
    use HasFactory;
    
     protected $fillable = [
        'name',
        'avatar',
        'note',
        'danhmuc'
       
    ];
}
