<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();

        if ($data['isChangeFile']) {
            if ($category->image)
                Storage::disk('public')->delete($category->image);

            if (isset($data['image'])) {
                $data['image'] = Storage::disk('public')->put('/images', $data['image']);
            } else {
                $data['image'] = null;
            }
        } else {
            unset($data['image']);
        }
        unset($data['isChangeFile']);

        $category->update($data);

        return redirect()->route('admin.category.show', $category->id);
    }
}
