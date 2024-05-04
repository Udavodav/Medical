<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Category;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        if (isset($data['image']))
            $data['image'] = Storage::disk('public')->put('/images', $data['image']);

        try {
            Category::create($data);
        } catch (\Exception $exception) {
            Storage::disk('public')->delete($data['image']);
            abort(500);
        }

        return redirect()->route('admin.category.index');
    }
}
