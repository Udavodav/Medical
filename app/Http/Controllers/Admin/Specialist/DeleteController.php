<?php

namespace App\Http\Controllers\Admin\Specialist;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Specialist\StoreRequest;
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

class DeleteController extends Controller
{
    public function __invoke(Doctor $specialist)
    {
        $specialist->delete();

        return redirect()->route('admin.specialist.index');
    }
}
