@extends('layouts.app')

@section('content')
<h1>Following</h1>
    @foreach($users->following as $user)
    @include('profiles._followee')
    @endforeach
@endsection
