@extends('layouts.app')

@section('content')
    @foreach($user->following as $user)
        @incle('profiles._followee')
    @endforeach
@endsection
