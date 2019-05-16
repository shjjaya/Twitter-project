<?php

namespace App\Http\Controllers;

use App\UserAvatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserAvatarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $path = $request->file('avatar')->store(
    'avatars/'.$request->user()->id, 's3'
    );

    $visibility = Storage::getVisibility('file.jpg');

    Storage::setVisibility('file.jpg', 'public')
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserAvatar  $userAvatar
     * @return \Illuminate\Http\Response
     */
    public function show(UserAvatar $userAvatar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserAvatar  $userAvatar
     * @return \Illuminate\Http\Response
     */
    public function edit(UserAvatar $userAvatar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserAvatar  $userAvatar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $path = $request->file('avatar')->store('avatars');

           return $path;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserAvatar  $userAvatar
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserAvatar $userAvatar)
    {
        //
    }
}
