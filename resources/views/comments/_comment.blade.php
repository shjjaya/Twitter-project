<div class="list-group-item">
    <a href="/profiles/{{ $comment->user->name }}"></a>
        <strong>{{ $comment->user->name }}</strong>
    <p>{{ $comment->body }}</p>
        <p><a href="/tweets/{{ $tweet->id }}/comments/{{ $comment }}"></a>
    </p>

    @if($comment->belongs_to_user)
        <form action="/comment/{{ $comment->id }}" method="POST">
            @csrf
            {{ method_field('DELETE')}}
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    @endif
</div>
