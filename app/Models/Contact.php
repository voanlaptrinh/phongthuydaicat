<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
     protected $fillable = [
        'username',
        'phone',
        'email',
        'address',
        'loai_dich_vu',
        'mo_ta',
    ];
}
