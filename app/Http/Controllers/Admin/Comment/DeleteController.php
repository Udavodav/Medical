<?php

namespace App\Http\Controllers\Admin\Comment;

use App\Http\Controllers\Controller;
use App\Models\CommentsDoctor;
use App\Models\Competence;

class DeleteController extends Controller
{
    public function __invoke(CommentsDoctor $comment)
    {
        $comment->delete();

        return redirect()->route('admin.comment.index');
    }
}
