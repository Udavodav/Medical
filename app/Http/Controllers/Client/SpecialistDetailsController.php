<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class SpecialistDetailsController extends Controller
{
    public function __invoke(Doctor $specialist)
    {
        return view('client.doctor_details', compact('specialist'));
    }
}
