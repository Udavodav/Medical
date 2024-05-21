<?php

namespace App\Http\Controllers\Admin\Competence;

use App\Http\Controllers\Controller;
use App\Models\Competence;

class IndexController extends Controller
{
    public function __invoke()
    {
        $competences = Competence::withTrashed()->get();
        return view('admin.competence.index', compact('competences'));
    }
}
