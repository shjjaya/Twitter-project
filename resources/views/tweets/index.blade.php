@extends('layouts.app')
@section('content')
 
    @include('tweets._create')
    @foreach($tweets as $tweet)
        @include('tweets._tweet')
    @endforeach

@endsection
