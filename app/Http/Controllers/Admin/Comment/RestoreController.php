<?php

namespace App\Http\Controllers\Admin\Comment;

use App\Http\Controllers\Controller;
use App\Models\CommentsDoctor;
use App\Models\Competence;

class RestoreController extends Controller
{
    public function __invoke(CommentsDoctor $comment)
    {
        $comment->restore();

        return redirect()->route('admin.comment.index');
    }
}
