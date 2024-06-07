<?php

namespace App\Http\Controllers\Admin\Specialist;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Specialist\StoreRequest;
use App\Http\Requests\Admin\Specialist\UpdateRequest;
use App\Models\AnswerEmpty;
use App\Models\AnswerOption;
use App\Models\AnswerOrder;
use App\Models\Competence;
use App\Models\Doctor;
use App\Models\Question;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdateDataController extends Controller
{
    public function __invoke(UpdateRequest $request, Doctor $specialist)
    {
        $data = $request->validated();


        if ($data['isChangeFile']) {
            if ($specialist->image)
                Storage::disk('public')->delete($specialist->image);

            if (isset($data['image'])) {
                $data['image'] = Storage::disk('public')->put('/images', $data['image']);
            } else {
                $data['image'] = null;
            }
        } else {
            unset($data['image']);
        }
        unset($data['isChangeFile']);

        $specialist->update($data);

        return redirect()->route('admin.specialist.show', $specialist->id);
    }
}
