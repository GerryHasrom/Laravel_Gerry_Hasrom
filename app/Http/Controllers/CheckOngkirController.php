<?php

namespace App\Http\Controllers;

// ini untuk mengimpor kelas yg diperlukan 
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

// ini untuk mengextends ke controller utama laravel di controller
class CheckOngkirController extends Controller  
{
    // utk mencari provinsi berdasar kata kunci yg diberikan dalam permintaan
    public function province(Request $request){
        try {
            $provinces = Province::where('name', 'like', '%'.$request->keyword.'%')->select('id', 'name')->get();
            $data = [];
            foreach ($provinces as $province) {
                $data[] = [
                    'id'    => $province->id,
                    'text'  => $province->name
                ];
            }

            return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Data Fetch Failed',
                'data'    => []
            ]);
        }
    }

    // utk mencari kota berdasar kata kunci yg diberikan dalam permintaan
    public function city(Request $request){
        try {
            $cities = Province::find($request->province_id)->cities()
                        ->where('name', 'like', '%'.$request->keyword.'%')            
                        ->select('id', 'name')->get();

            $data = [];
            foreach ($cities as $city) {
                $data[] = [
                    'id'    => $city->id,
                    'text'  => $city->name
                ];
            }

            return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Data Fetch Failed',
                'data'    => []
            ]);
        }
    }

    //  utk memeriksa ongkir antara dua lokasi menggunakan layanan dari RajaOngkir API.
    public function checkOngkir(Request $request){
        try {
            $response = Http::withOptions(['verify' => false,])->withHeaders([
                'key' => env('RAJAONGKIR_API_KEY')
            ])->post('https://api.rajaongkir.com/starter/cost',[
                'origin'        => $request->origin,
                'destination'   => $request->destination,
                'weight'        => $request->weight,
                'courier'       => $request->courier
            ])
            ->json()['rajaongkir']['results'][0]['costs'];

            return response()->json($response);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
                'data'    => []
            ]);
        }
    }
}

