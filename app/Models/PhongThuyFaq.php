<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongThuyFaq extends Model
{
    use HasFactory;
    protected $fillable = [
        'question',
        'answer',
        'phong_thuy_id',
    ];

    public function phongthuy()
    {
        return $this->belongsTo(PhongThuy::class);
    }
}
