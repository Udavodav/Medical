<?php

namespace App\Http\Controllers\Admin\Specialist;

use App\Http\Controllers\Controller;
use App\Models\Doctor;

class ShowController extends Controller
{
    public function __invoke(Doctor $specialist)
    {
        return view('admin.specialist.show', compact('specialist'));
    }
}
