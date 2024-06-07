<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CommentsDoctor;
use App\Models\Doctor;
use Illuminate\Http\Request;

class SpecialistDetailsController extends Controller
{
    public function __invoke(Doctor $specialist)
    {
        $comments = CommentsDoctor::where('doctor_id', $specialist->id)->orderBy('date', 'desc')->get();

        return view('client.doctor_details', compact(['specialist', 'comments']));
    }
}
