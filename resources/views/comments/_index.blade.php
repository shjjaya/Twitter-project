<div class="list-group">
    @foreach ($tweet->comments as $comment)
        @include('comments._comment')
    @endforeach
    <div class="text-right">
        @if(Auth::id() == $tweet->user_id)
            <a class="btn btn-danger" href="/delete">Delete</a>
        @endif
    </div>
</div>
