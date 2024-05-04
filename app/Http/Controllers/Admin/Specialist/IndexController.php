<?php

namespace App\Http\Controllers\Admin\Specialist;

use App\Http\Controllers\Controller;
use App\Models\Doctor;

class IndexController extends Controller
{
    public function __invoke()
    {
        $specialists =  Doctor::withTrashed()->get();
        return view('admin.specialist.index', compact('specialists'));
    }
}
