<?php

namespace App\Http\Controllers\Admin\Specialist;

use App\Http\Controllers\Controller;
use App\Models\Competence;
use App\Models\Doctor;
use App\Models\User;

class EditUserController extends Controller
{
    public function __invoke(User $user)
    {
        return view('admin.specialist.edit_user', compact('user'));
    }
}
