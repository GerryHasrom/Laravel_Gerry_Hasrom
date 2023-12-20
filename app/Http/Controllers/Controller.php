<?php

namespace App\Http\Controllers;

// utk mendefenisikan namespace dan mengimpor kelas yang diperlukan untuk digunakan di kelas lain.
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

// ini adalah kelas dasar untuk semua controllernya
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
                                     