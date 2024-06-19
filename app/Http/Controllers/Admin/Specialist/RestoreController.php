<?php

namespace App\Http\Controllers\Admin\Specialist;

use App\Http\Controllers\Controller;
use App\Models\Doctor;

class RestoreController extends Controller
{
    public function __invoke(Doctor $specialist)
    {
        $specialist->restore();
        $specialist->user()->restore();
        return redirect()->route('admin.specialist.show', $specialist->id);
    }
}
