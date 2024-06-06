<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Write;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisitController extends Controller
{
    public function __invoke()
    {
        $writes = Write::where('client_id', Auth::user()->client->id)->orderBy('date_write', 'desc')->orderBy('time_write')->get();

        return view('client.visit', compact(['writes']));
    }
}
