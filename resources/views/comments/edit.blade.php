@extends ('layouts.app')

@section ('content')
<h1 class="title">Edit Comment</h1>
<form action="/tweets/{{$comment->tweet->id}}/comments/{{$comment->id}}" method="POST">
    <input type="hidden" name="_method" value="PUT">
    @include('comments._form')
</form>
<form action="/tweets/{{$comment->tweet->id}}/comments/{{$comment->id}}" method="POST">
    @csrf
    {{ method_field('DELETE') }}
    <button type="submit" class="btn btn-danger">Delete</button>
</form>
@endsection
