<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Value\GetServicesRequest;
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GetServicesController extends Controller
{
    public function __invoke(GetServicesRequest $request)
    {
        $data = $request->validated();
        $doctor = Doctor::where('id', $data['doctor_id'])->first();
        return $doctor->services;
    }
}
