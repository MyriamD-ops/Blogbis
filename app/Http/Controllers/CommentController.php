<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $comments = Comment::were('user_id', Auth::user()->id)->get();
      return view('comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post)
    {
        // Valider
        $validated = $request->validate([
            'content' => 'required',
        ]);

        $validated["user_id"]=Auth::user()->id;
        $validated["post_id"]=$post->id;

        Comment::create($validated);


        // Rediriger
        return redirect()->route('posts.show',$post->id )->with('success', 'commentaire ajouté');
    }



    /**
     * Display the specified resource.
     */
    public function show(comment $comment)
    {
        return view('comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(comment $comment)
    {
        return view('comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, comment $comment)
    {
        //Valider et mettre à jour le post
        $validated = $request->validate ([
            'content' => 'required',
        ]);
        $comment->content = $validated['content'];
        $comment->save();

        return redirect()->route('comments.show')->with('success', 'comment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(comment $comment)
    {
        $comment->delete();
        return redirect()->route('comments.show',$comment);
    }
}
