@extends('layouts.app')

@section('content')
    @foreach($user->followers as $user)
        @incle('profiles._followee')
    @endforeach
@endsection
