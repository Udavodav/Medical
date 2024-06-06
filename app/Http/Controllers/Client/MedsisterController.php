<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedsisterController extends Controller
{
    public function __invoke()
    {
        $services = Doctor::where('id', Auth::user()->doctor->id)->first()->services;

        return view('client.medsister', compact('services'));
    }
}
