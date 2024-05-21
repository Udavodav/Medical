<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Http\Request;

class AddController extends Controller
{
    public function __invoke(Doctor $specialist)
    {
        $ids = $specialist->services->pluck('id');
        $services = Service::whereNotIn('id', $ids)->orderBy('title')->get();
        return view('admin.specialist.add_service', compact(['specialist', 'services']));
    }
}
