<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use App\Models\Service;

class DeleteController extends Controller
{
    public function __invoke(Service $service)
    {
        $service->delete();

        return redirect()->route('admin.category.show', $service->category()->withTrashed()->first()->id);
    }
}
