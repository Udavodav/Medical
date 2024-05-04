<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Category $category, Service $service)
    {
        return view('admin.service.edit', compact(['category', 'service']));
    }
}
