<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LikeController extends Controller
{
    public function like($id){

        $likes = \App\Like::where('user_id', auth()->user()->id)
        ->where('likeable_id', $id)
        ->get();

        // dd($likes);

        if ($likes->count() > 0){
            //delete all the likes
            foreach ($likes as $like) {
                // code...
                \App\Like::destroy($like->id);
            }


        } else {
            //make a new like

            $like = new \App\Like;
            $like->user_id = Auth::id();
            $like->likeable_id = $id;
            $like->likeable_type = 'App\Tweet';
            $like->save();
        }



        return redirect('/tweets/'. $id);
    }
}
