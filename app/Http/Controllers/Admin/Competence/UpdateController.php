<?php

namespace App\Http\Controllers\Admin\Competence;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Competence\UpdateRequest;
use App\Models\Competence;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Competence $competence)
    {
        $data = $request->validated();
        $competence->update($data);

        return redirect()->route('admin.competence.index', $competence->id);
    }
}
