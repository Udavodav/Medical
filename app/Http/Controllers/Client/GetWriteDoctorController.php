<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Value\GetWriteDoctorRequest;
use App\Models\Write;
use Illuminate\Http\Request;

class GetWriteDoctorController extends Controller
{
    public function __invoke(GetWriteDoctorRequest $request)
    {
        $data = $request->validated();
        $writes = Write::where([['doctor_id','=', $data['doctor_id']],
                            ['date_write', '=', $data['date']]])
            ->doesnthave('visit')
            ->orderBy('time_write')->get();

        $arr = [];
        foreach($writes as $write){
            $item['id'] = $write->id;
            $item['time'] = $write->time_write;
            $item['client_name'] = $write->client->name;
            $item['service'] = $write->service->title;
            $arr[] = $item;
        }

        return $arr;
    }
}
