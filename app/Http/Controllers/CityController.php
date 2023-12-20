<?php

namespace App\Http\Controllers;

// utk mengimpor kelas yang dibutuhkan
use Illuminate\Http\Request;
use App\Models\City;

// utk mengekstend ke controller utama di controller
// mendapatkan daftar kota berdasarkan kode provinsi yang diberikan
class CityController extends Controller
{
    // ini utk metode getcities
    public function getCities($province_id)
    {
        $cities = City::where('province_code', $province_id)->pluck('title', 'code');

        return response()->json($cities);
    }
}

