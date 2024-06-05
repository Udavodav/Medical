<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Write;
use Illuminate\Http\Request;

class DoctorWriteController extends Controller
{
    public function __invoke()
    {
        return view('client.doctor_writes');
    }
}
