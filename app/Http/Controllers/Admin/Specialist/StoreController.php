<?php

namespace App\Http\Controllers\Admin\Specialist;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Specialist\StoreRequest;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        if (isset($data['image']))
            $data['image'] = Storage::disk('public')->put('/images', $data['image']);

        try {
            DB::transaction(function () use ($data) {

                $userData['role_id'] = '2';
                $userData['password'] = $data['password'];
                $userData['email'] = $data['email'];
                unset($data['email']);
                unset($data['password']);

                $user = User::create($userData);
                $data['user_id'] = $user->id;
           Doctor::create($data);
            });
        } catch (\Exception $exception) {
            Storage::disk('public')->delete($data['image']);
            abort(500);
        }

        return redirect()->route('admin.specialist.index');
    }
}
