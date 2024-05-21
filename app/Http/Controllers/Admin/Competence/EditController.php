<?php

namespace App\Http\Controllers\Admin\Competence;

use App\Http\Controllers\Controller;
use App\Models\Competence;

class EditController extends Controller
{
    public function __invoke(Competence $competence)
    {
        return view('admin.competence.edit', compact('competence'));
    }
}
