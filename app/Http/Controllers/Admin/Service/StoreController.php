<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Service\StoreRequest;
use App\Models\Service;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        try {
            Service::create($data);
            return redirect()->route('admin.category.show', $data['category_id']);
        } catch (\Exception $exception) {
            abort(500);
        }

    }
}
