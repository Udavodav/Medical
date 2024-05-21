<?php

namespace App\Http\Controllers\Admin\Specialist;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Service;

class DeleteServiceController extends Controller
{
    public function __invoke(Doctor $spec, Service $serv)
    {
        $spec->services()->withTrashed()->detach($serv->id);

        return redirect()->route('admin.specialist.show', $spec->id);
    }
}
