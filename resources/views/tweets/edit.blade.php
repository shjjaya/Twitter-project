@extends('layouts.app')

    @section('content')
        <h1 class-"title">Changing what's on your mind?</h1>
            <form action="/tweets/{{ $tweet->id }}" method="post">
                <input type="hidden" name="_method" value="put"/>
                @crsf
                <div class="form-group">
                    <textarea name="body" class="form-control" placeholder="{{ $tweet->body}}"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Tweet!</button>
                </div>
                @if(Auth::id = $id)
                <form action="/tweets/{{ $tweet->id }}" method="POST">
                    <input type="hidden" name="_method" value="delete">
                        <button class="btn btn-danger">Delete</button>
                    </input>
                </form>
                @endif
            </form>
    @endsection
