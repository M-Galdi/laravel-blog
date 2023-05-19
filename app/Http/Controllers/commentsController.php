<?php

namespace App\Http\Controllers;

use App\Models\article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class commentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function store(Request $request, $article)
    {
        $comment = Comment::create(['article_id' => $article, 'user' => Auth::user()->name, 'content' => $request->input('comment')]);
        $article = Article::find($article);
        $article->comments()->save($comment);

        return redirect()->route('articles.show', ['article' => $article->id]);
    }



}
