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

class UpdateDataController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

       // try {
            DB::transaction(function () use ($data) {
                if (isset($data['image']))
                    $data['image'] = Storage::disk('public')->put('/images', $data['image']);

                $userData['role_id'] = '2';
                $userData['password'] = $data['password'];
                $userData['email'] = $data['email'];
                unset($data['email']);
                unset($data['password']);

                $user = User::create($userData);
                $data['user_id'] = $user->id;
           Doctor::create($data);
            });
//        } catch (\Exception $exception) {
//            abort(500);
//        }

        return redirect()->route('admin.specialist.index');
    }
}
