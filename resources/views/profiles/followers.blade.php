@extends('layouts.app')

@section('content')
    <h1>Followers</h1>
        @foreach($user->followers as $user)
            @include('followw._followee')
        @endforeach
    {{ $users->links() }}
@endsection
