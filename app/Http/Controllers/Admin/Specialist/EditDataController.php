<?php

namespace App\Http\Controllers\Admin\Specialist;

use App\Http\Controllers\Controller;
use App\Models\Competence;
use App\Models\Doctor;

class EditDataController extends Controller
{
    public function __invoke(Doctor $specialist)
    {
        $competences = Competence::all();
        return view('admin.specialist.edit_data', compact(['specialist', 'competences']));
    }
}
