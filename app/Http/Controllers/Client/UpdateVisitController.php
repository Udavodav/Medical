<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\UpdateVisitRequest;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateVisitController extends Controller
{
    public function __invoke(UpdateVisitRequest $request)
    {
        $data = $request->validated();
        $visit = Visit::where('id', $data['visit_id'])->first();

        if($data['isChangeFile']){
            if ($visit->file)
                Storage::disk('public')->delete($visit->file);

            if (isset($data['file'])){
                $data['file'] = Storage::disk('public')->put('/documents', $data['file']);
            }else{
                $data['file'] = null;
            }
        }else{
            unset($data['file']);
        }
        unset($data['isChangeFile']);
        unset($data['visit_id']);

        $visit->update($data);

        return ['comment' => $data['conclusion'], 'file' => isset($data['file']) ? $data['file'] : null];
    }
}
