@extends('layouts.app')

@section('content')
<h1>Following</h1>
    @foreach($user->following as $user)
    @include('followw._followee')
    @endforeach
    {{ $users->links() }}
@endsection
