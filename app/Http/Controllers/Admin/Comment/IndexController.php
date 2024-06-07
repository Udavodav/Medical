<?php

namespace App\Http\Controllers\Admin\Comment;

use App\Http\Controllers\Controller;
use App\Models\CommentsDoctor;
use App\Models\Competence;

class IndexController extends Controller
{
    public function __invoke()
    {
        $comments = CommentsDoctor::withTrashed()->get();
        return view('admin.comment.index', compact('comments'));
    }
}
