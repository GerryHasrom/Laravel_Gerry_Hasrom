<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // untuk membuat data dummy (hasfactory)
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends Model
{
    use HasFactory;
    protected $guarded = []; // ini artinya kota tidak dpt dimasukkan secara massal

    public function province(): BelongsTo // ini utk membangun relasi city dengan province 
{ 
    return $this->belongsTo(Province::class); // belongsto itu krn satu kota masuk kedalam satu provinsi
}
}
