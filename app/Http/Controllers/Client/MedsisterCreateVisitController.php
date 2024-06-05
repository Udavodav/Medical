<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\StoreMedsisterVisitRequest;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Visit;
use App\Models\Write;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MedsisterCreateVisitController extends Controller
{
    public function __invoke(StoreMedsisterVisitRequest $request)
    {
        $data = $request->validated();

         try {
            DB::transaction(function () use ($data) {
                $writeData['date_write'] = $data['date_write'];
                $writeData['time_write'] = 0;
                $writeData['client_id'] = $data['client_id'];
                $writeData['service_id'] = $data['service_id'];
                $writeData['doctor_id'] = 2; //TODO: Auth->user()

                $write = Write::create($writeData);

                $visit['conclusion'] = $data['conclusion'];
                $visit['write_id'] = $write->id;
                if (isset($data['file']))
                    $visit['file'] = Storage::disk('public')->put('/documents', $data['file']);

                Visit::create($visit);
            });
         } catch (\Exception $exception) {
             abort(500);
         }

        return ['message' => 'Успешно'];
    }
}
