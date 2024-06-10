<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\StoreWriteRequest;
use App\Mail\NotificationMail;
use App\Models\Client;
use App\Models\Doctor;
use App\Models\Service;
use App\Models\Write;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class StoreWriteController extends Controller
{
    public function __invoke(StoreWriteRequest $request)
    {
        $data = $request->validated();

        try {
            Write::create($data);
            $client = Client::where('id', $data['client_id'])->first();
            $doctor = Doctor::where('id', $data['doctor_id'])->first();

            Mail::to($client->user->email)
                ->send(new NotificationMail($client->name, $data['date_write'], $data['time_write'], $doctor->name, $doctor->services()->where('id', $data['service_id'])->first()->title));

            return redirect()->route('client.visits');
        } catch (QueryException $e) {
            abort(500);
        }

    }

}
