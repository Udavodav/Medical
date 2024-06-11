<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Value\GetServicesRequest;
use App\Http\Requests\Value\GetSpecialistsRequest;
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GetSpecialistsController extends Controller
{
    public function __invoke(GetSpecialistsRequest $request)
    {
        $data = $request->validated();
        $doctors = Doctor::where('competence_id', $data['competence_id'])->get();
        return $doctors;
    }
}
