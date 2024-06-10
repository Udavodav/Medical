<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Http\Request;

class WriteController extends Controller
{
    public function __invoke()
    {
        $specialists = Doctor::where('competence_id','<>', 0)->has('services')->get();
        return view('client.write', compact(['specialists']));
    }

}
