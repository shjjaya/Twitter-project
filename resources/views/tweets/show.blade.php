@extends('layouts.app')
@section('content')
    @include('tweets._tweet')
    <h3 class="title" id="comments">Comments</h3>
    @include('comments._index')
    @include('comments._create')

@endsection
