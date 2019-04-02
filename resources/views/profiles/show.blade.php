@extends('layouts.app')

@section('content')
<form method="get" action="/tweets/">
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Tweets</button>
    </div>
</form>

     @if(Auth::id() == $user->id)
        <a href="/profiles/{{ $user->id }}/edit" class="btn btn-primary">Edit Profile</a>
    @endif
        <h1 class="title">{{ $user->name }}</h1>
            <p>{{ $user->profile->bio }}</p>
        <ul class="list-group">
            <li class="list-group-item">Location: {{ $user->profile->location }}</li>
            <li class="list-group-item">Birthday: {{ $user->profile->birthday }}</li>
        </ul>

        <div class="card-text">
            <a href="/follower/{{ $user->id }}">Followers ({{ $user->followers->count() }})</a> -
            <a href="/following/{{ $user->id }}">Following ({{ $user->following->count() }})</a>
        </div>
@endsection
