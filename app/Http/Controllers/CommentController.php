<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CommentController extends Controller
{
    public function __invoke(Request $request)
    {
        return Inertia::render('comment/index' ,
    [
        'posts' => PostResource::collection(Post::with('user')->latest()->get()) ,
    ]);
    }
}
