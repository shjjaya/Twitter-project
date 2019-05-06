<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Tweet;
use \App\User;
use \App\Comment;
use Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
     {
         $commnet - new \App\Comment;
         $comment->body = $request->get('comment_body');
         $comment->user_id = Auth::id();
         $comment->tweet_id = $id;
         $comment->save();
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //dd(request()->all());
        $comment = new \App\Comment;
        $comment->body = $request->get('comment_body');
        $comment->user_id = Auth::user()->id;
        $comment->tweet_id = $id;
        // $comment->body = $request->input('body');
        $comment->save();
        return redirect('/tweets/' . $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit($tweet_id, $comment_id)
     {
         $comment = \App\Comment::find($comment_id);
         return view('tweets.comments.edit' , compact('comment'));
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $tweet_id, $comment_id)
     {
         $comment = Comment::find($comment_id);
         $comment->user_id = Auth::if();
         $comment->body = $request->body;
         $comment->save();
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::destroy($id);
        return redirect('/tweets');
    }
}
