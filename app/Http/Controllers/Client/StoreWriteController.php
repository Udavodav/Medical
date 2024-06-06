<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\StoreWriteRequest;
use App\Models\Write;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class StoreWriteController extends Controller
{
    public function __invoke(StoreWriteRequest $request)
    {
        $data = $request->validated();

        try {
            Write::create($data);

            return redirect()->route('client.visits');
        } catch (QueryException $e) {
            abort(500);
        }

        return redirect()->route('client.index');
    }

}
