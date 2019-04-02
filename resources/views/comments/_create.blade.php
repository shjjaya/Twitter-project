<div class="card mt-4">
    <div class="card-body">
        <form method="POST" class="form-inline" action="/tweets/{{ $tweet->id }}/comments">
            {{ csrf_field() }}
            <div class="form-group col-10">
                <input type="text" name="body"  class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Add Comment</button>
            </div>
        </form>
    </div>
</div>
