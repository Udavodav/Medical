<?php

namespace App\Http\Controllers\Admin\Competence;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Competence\StoreRequest;
use App\Models\Competence;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        try {
            Competence::create($data);
        } catch (\Exception $exception) {
            abort(500);
        }

        return redirect()->route('admin.competence.index');
    }
}
