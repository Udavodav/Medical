<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function __invoke(Category $category)
    {
        $services = Service::where('category_id', $category->id)->get();
        return view('client.service.services', compact('services'));
    }
}
