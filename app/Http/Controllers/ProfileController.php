<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \App\User::find($user);

        return view('profiles.show', compact('user'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = \App\User::find($id);

        return view('profiles.show', compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = \App\User::find($id);
        return view('profiles.edit', compact('user'));
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


        //avatar upload

        $user = \App\User::find($id);
        $profile = $user->profile;
        $profile->location = $request->location;
        $profile->bio = $request->bio;
        $profile->birthday = $request->birthday;

        // $profile = $request->all();

        // validation
        $request->validate([
            'location'  =>  'required|max:30',
            'birthday'  =>  'required|date',
            'bio'       =>  'max:400',
            'avatar'    => 'image|mimes:jpeg,jpg,png,gif|max:2048'
        ]);
        $profle = \App\Profile::where('user_id', $id)->first();

        foreach($request->except(['_method', '_token', 'avatar'])as $k=>$v) {
            $profile->$k = $v;
        }

        if($request->file('avatar')) {
            //assign for easy access
            $image = $request->file('avatar');

            // generate unique id + file extension
            $new_name = uniquid() . '.' . $image->getClientOriginalExtension();

            // store image in public folder

            Storage::disk(s3)->put("/avatars/" . $id . '/' . $new_name, file_get_contents($image), 'public');
            //save image path to profile object
            $profile->avatar = $new_name;

        } else {
            $profle->avatar = $new_name;
        }



         if($profile->save()) {
             return redirect('/profiles/' .$id);
         }
         return back();
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


        return redirect('/home');
    }

    public function followers($id) {
    $user = \App\User::with('followers')->find($id);
    return view('profiles.followers', compact('user'));
    }

    public function following($id) {
    $user = \App\User::with('following')->find($id);
    return view('profiles.following', compact('user'));
    }

    public function currentUser() {

    }
}
