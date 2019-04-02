<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
// use \App\Tweet;
// use \App\User;
// use Illuminate\Support\Facades\Auth;

class TweetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get a simple array from IF of user i follow
        $following = \App\User::find(Auth::id())->following->pluck('id')->toArray();
        //load
        $tweets = \App\Tweet::latest()->get();
        $tweets =\App\Tweet::with(['user','comments','likes'])
                ->whereIn('user_id', $following)
                ->paginate(20);

        // view
        return view('tweets.index', compact('tweets'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tweet = new\App\Tweet;
        return view('/tweets/', compact('tweet'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //tweet must be of 2 charecters and max of 200
        $request->validate([
        'body' => 'min:2|max:200'
        ]);
        // create the tweet
        $tweet = new\App\Tweet;
        $tweet->body = $request->input('body');
        $tweet->user_id = Auth::id();
        $save = $tweet->save();


         //check if save was successful
         if($tweet) {
             //successful
             return redirect('/tweets/' . $tweet->id);
         } else {
             //fail
             dd('Unspecified error');
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //load the tweet based on the id parameter
        $tweet = \App\Tweet::find($id);

        //return a view, pass it data
        return view('tweets.show', compact('tweet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tweet = \App\Tweet::find($id);
        return view ('tweets.edit', compact('tweet'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'body'      =>  'min:2|max:200'
        ]);
        // //load the object to be edited
        $tweet = \App\Tweet::find($id);

        $tweet->body = $request->body;

        if($tweet->save()){
            //success
            return redirect('/tweets' . $tweet->id);
        } else {
            // fail
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tweet = \App\Tweet::destroy($id);
        return redirect('/tweets');
    }
}
