<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Competence;
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Http\Request;

class WriteController extends Controller
{
    public function __invoke()
    {
        $competences = Competence::where('id', '<>', 0)->get();
        return view('client.write', compact(['competences']));
    }

}
