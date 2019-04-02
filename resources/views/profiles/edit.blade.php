@extends('layouts.app')

@section('content')
    <form action="/profiles/{{ $user->id }}" method="POST">
        @csrf
            {{ method_field('put') }}
        <div class="form-group">
            <label>Location</label>
            <input type="text" name="location" value="{{ $user->profile->location }}">
        </div>
        <div class="form-group">
            <label>Birthday</label>
            <input type="date" name="birthday" value="{{ $user->profile->birthday }}">
        </div>
        <div class="form-group">
            <label>Bio</label>
            <textarea class="form-control" name="bio">{{ $user->profile->bio }}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" name="btn btn-primary">Save</button>
        </div>
    </form>
@endsection
