<?php

namespace App\Http\Controllers\Admin\Competence;

use App\Http\Controllers\Controller;
use App\Models\Competence;

class RestoreController extends Controller
{
    public function __invoke(Competence $competence)
    {
        $competence->restore();

        return redirect()->route('admin.competence.index');
    }
}
