<div class="card mt-4">
    <div class="card-body">
        <form method="POST" class="form-inline" action="/tweets/{{ $tweet->id }}/comments">
            {{ csrf_field() }}
            <div class="form-group col-10">
                <input type="text" name="comment_body"  class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="add comment">
            </div>
        </form>
    </div>
</div>
