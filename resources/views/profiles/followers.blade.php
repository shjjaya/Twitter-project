@extends('layouts.app')

@section('content')
    <h1 class="title">Followers {{ $users->followers->count() }}</h1>
        @foreach($users->followers as $user)
            @include('profiles._followee')
        @endforeach
@endsection
