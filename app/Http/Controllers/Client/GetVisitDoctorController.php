<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Value\GetVisitDoctorRequest;
use App\Http\Requests\Value\GetWriteDoctorRequest;
use App\Models\Visit;
use App\Models\Write;
use Illuminate\Http\Request;

class GetVisitDoctorController extends Controller
{
    public function __invoke(GetVisitDoctorRequest $request)
    {
        $data = $request->validated();
        $visits = Visit::whereHas('write', function ($q) use ($data) {
            $q->where([['doctor_id','=', $data['doctor_id']],
                ['date_write', '=', $data['date']]])
                ->orderBy('time_write');
        })->get();

        $arr = [];
        foreach($visits as $visit){
            $item['id'] = $visit->id;
            $item['time'] = $visit->write->time_write;
            $item['client_name'] = $visit->write->client->name;
            $item['service'] = $visit->write->service->title;
            $item['conclusion'] = $visit->conclusion;
            $item['file'] = $visit->file;
            $arr[] = $item;
        }

        return $arr;
    }
}
