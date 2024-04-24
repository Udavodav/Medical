<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();
        return view('client.service.category_list', compact('categories'));
    }
}
