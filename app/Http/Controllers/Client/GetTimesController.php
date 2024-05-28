<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Value\GetTimesRequest;
use App\Models\Doctor;
use App\Models\Service;
use App\Models\Write;
use Illuminate\Http\Request;

class GetTimesController extends Controller
{
    public function __invoke(GetTimesRequest $request)
    {
        $data = $request->validated();

        $writes = Write::where([
            ['date_write', 'LIKE', $data['date_write']],
            ['doctor_id', '=', $data['doctor_id']]])->orderBy('time_write')->get();

        return response($this->getPeriodsTime($writes, $data['date_write'], Service::where('id', $data['service_id'])->first()->duration));
    }

    private function getPeriodsTime($periods, $date, $duration)
    {
        $arr = [];
        $time = 480;
        $endTime = 60 * (date('N', strtotime($date)) > 5 ? 17 : 19);

        while($time <= $endTime-$duration){
            if(count($periods) != 0){
                if($time < $periods->first()->time_write && $time + $duration <= $periods->first()->time_write){
                    array_push($arr, $time);
                    $time += $duration;
                }
                else{
                    $time = $periods->first()->time_write + $periods->first()->service->duration;
                    $periods->shift();
                }
            }else{
                array_push($arr, $time);
                $time += $duration;
            }

        }

        return $arr;
    }

}
