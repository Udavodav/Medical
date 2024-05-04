<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Service\StoreRequest;
use App\Http\Requests\Admin\Service\UpdateRequest;
use App\Models\Service;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Service $service)
    {
        $data = $request->validated();
        $service->update($data);

        return redirect()->route('admin.category.show', $data['category_id']);

    }
}
