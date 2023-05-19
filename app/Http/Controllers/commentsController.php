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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request,  $article)
    // {
    //     $article = article::find($article->id);
    //     $comment = Comment::create(['article_id' => $article->id, 'content' => $request->input('comment')]);
    //     $article->comments()->save($comment);

    //     return redirect()->route('articles.show');
    // }

    public function store(Request $request, $article)
    {
        $comment = Comment::create(['article_id' => $article, 'user' => Auth::user()->name, 'content' => $request->input('comment')]);
        $article = Article::find($article);
        $article->comments()->save($comment);

        return redirect()->route('articles.show', ['article' => $article->id]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
