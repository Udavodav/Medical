<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use App\Models\Service;

class RestoreController extends Controller
{
    public function __invoke(Service $service)
    {
        $service->restore();

        return redirect()->route('admin.category.show', $service->category()->withTrashed()->first()->id);
    }
}
