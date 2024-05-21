<?php

namespace App\Http\Controllers\Admin\Specialist;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Service\StoreServiceRequest;
use App\Models\Doctor;

class StoreServiceController extends Controller
{
    public function __invoke(StoreServiceRequest $request)
    {
        $data = $request->validated();

        try {
            $specialist = Doctor::where('id', $data['specialist_id'])->withTrashed()->first();
            $specialist->services()->attach($data['service_ids']);

            return redirect()->route('admin.specialist.show', $specialist->id);
        } catch (\Exception $exception) {
            abort(500);
        }

    }
}
