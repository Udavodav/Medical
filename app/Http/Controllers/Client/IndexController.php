<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Doctor;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all()->take(6);
        $specialists = Doctor::where('competence_id','<>', 0)->take(5)->get();
        return view('client.index', compact(['categories', 'specialists']));
    }
}
