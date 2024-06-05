<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class MedsisterController extends Controller
{
    public function __invoke()
    {
        // TODO: добавить Auth->user()
        $services = Doctor::where('id', 3)->first()->services;

        return view('client.medsister', compact('services'));
    }
}
