<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Province extends Model
{
    use HasFactory;
    protected $guarded = [];

    // utk membangun relasi dari province ke city   
    public function cities(): HasMany
    {
        return $this->hasMany(City::class); // hasmany utk satu provinsi memiliki banyak kota 
    }
}

// jadi hasmany dan belongsto itu adalah sebuah relasi model eloquent di laravel