<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DichVuFaq extends Model
{
    use HasFactory;
     protected $fillable = [
        'question',
        'answer',
        'dich_vu_id',
    ];

    public function dichvu()
    {
        return $this->belongsTo( DichVu::class);
    }
}
