<div class="list-group">
    @foreach ($tweet->comments as $comment)
        @include('comments._comment')
    @endforeach

</div>
