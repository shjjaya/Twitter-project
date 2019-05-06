@extends('layouts.app')

@section('content')

    <form method="get" action="/tweets/">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Tweets</button>
        </div>
    </form>

    {{ $user->first_name }} {{ $user->last_name}}
    @if(Auth::id() != $user->id)
        @include('followw._follow-user')
    @endif
    <h1 class="title">{{ $user->name }}</h1>
        <p>{{ $user->profile->bio }}</p>
    <ul class="list-group">
        <li class="list-group-item">Location: {{ $user->profile->location }}</li>
        <li class="list-group-item">Birthday: {{ $user->profile->birthday }}</li>
    </ul>

    <div class="card-text">
        <a href="/profiles/{{ $user->id }}/followers">Followers ({{ $user->followers()->count() }})</a> -
        <a href="/profiles/{{ $user->id }}/following">Following ({{ $user->following()->count() }})</a>
        @if($user = Auth::user())
            <a class="btn btn-primary" href="/profiles/{{$user->id}}/edit">Edit Profile</a>
        @endif
    </div>
@endsection
