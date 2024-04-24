<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class SpecialistController extends Controller
{
    public function __invoke()
    {
        $specialists = Doctor::all();
        return view('client.specialists', compact('specialists'));
    }
}
