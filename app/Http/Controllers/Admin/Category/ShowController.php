<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;

class ShowController extends Controller
{
    public function __invoke(Category $category)
    {
        $services = Service::where('category_id', $category->id)->withTrashed()->get();
        return view('admin.category.show', compact(['services', 'category']));
    }
}
