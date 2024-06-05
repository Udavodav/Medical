<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Write;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function __invoke()
    {
        // TODO: Client.id from Auth::user().id
        $writes = Write::where('client_id', 1)->orderBy('date_write', 'desc')->orderBy('time_write')->get();

        return view('client.visit', compact(['writes']));
    }
}
