<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatLichTuVan extends Model
{
    use HasFactory;
      protected $fillable = [
      'fullname',
        'phone',
        'email',
        'message',
        'status'
    ];
}
