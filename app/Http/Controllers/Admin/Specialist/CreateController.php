<?php

namespace App\Http\Controllers\Admin\Specialist;

use App\Http\Controllers\Controller;
use App\Models\Competence;
use App\Models\Doctor;

class CreateController extends Controller
{
    public function __invoke()
    {
        $competences = Competence::all();
        return view('admin.specialist.create', compact('competences'));
    }
}
