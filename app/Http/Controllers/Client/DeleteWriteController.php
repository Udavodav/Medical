<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Write;
use Illuminate\Http\Request;

class DeleteWriteController extends Controller
{
    public function __invoke(Write $write)
    {
        $write->delete();

        return redirect()->route('client.visits');
    }
}
