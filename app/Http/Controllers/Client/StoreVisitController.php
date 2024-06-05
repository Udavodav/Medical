<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\StoreVisitRequest;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreVisitController extends Controller
{
    public function __invoke(StoreVisitRequest $request)
    {
        $data = $request->validated();

        if (isset($data['file']))
            $data['file'] = Storage::disk('public')->put('/documents', $data['file']);

        Visit::create($data);

        return ["message" => "Успешно!"];
    }
}
