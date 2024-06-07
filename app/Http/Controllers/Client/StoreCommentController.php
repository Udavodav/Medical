<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\StoreCommentRequest;
use App\Models\CommentsDoctor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class StoreCommentController extends Controller
{
    public function __invoke(StoreCommentRequest $request)
    {
        $data = $request->validated();
        $data['client_id'] = Auth::user()->client->id;

        $comment = CommentsDoctor::create($data);
        $comment = CommentsDoctor::where('id', $comment->id)->first();

        return ['name'=>Auth::user()->client->name, 'date'=>Carbon::parse($comment->date)->format('d.m.Y H:i'), 'text'=>$comment->text,];
    }
}
