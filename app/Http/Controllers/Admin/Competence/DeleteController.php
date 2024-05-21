<?php

namespace App\Http\Controllers\Admin\Competence;

use App\Http\Controllers\Controller;
use App\Models\Competence;

class DeleteController extends Controller
{
    public function __invoke(Competence $competence)
    {
        $competence->delete();

        return redirect()->route('admin.competence.index');
    }
}
