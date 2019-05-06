<!-- <div class="card">
    <div class="card-body">
        <h5 class="card-title"><a href="/tweets/{{ $tweet->id }}">
      {{ $tweet->title }}</a></h5>

            {{ $tweet->user->name }}
          <div class="card-text">
            {{ $tweet->body }}
        </div>
    </div>
</div>  -->

<article class="card mb-4" id = "{{ $tweet->id }}" >
    <div class="card-body">
        <a href="/profiles/{{ $tweet->user->id }}" class="img-thumbnail float-left mr-2"  style="width:200px height:200px;"></a>
        <div style="height:80px;">
            <h4 class="card-title">{{ $tweet->user->name}}</h4>
            <h5 class="card-subtitle text-muted">{{ $tweet->created_at }}</h5>
        </div>
            <p class="card-text">{{ $tweet->body }}</p>
            @if(Auth::id() == $tweet->user_id)
            <a href="/tweets/{{ $tweet->id }}/tweets/{{ $tweet->id }}/edit">Edit</a>
            @endif
        <div class="card-text">
             <like-button></like-button>
            <a href="/tweets/{{ $tweet->id }}#comments">Comments({{ $tweet->comments->count() }} ) - </a>
                @if($tweet->belongs_to_user)
                    <form action="/tweets/{{ $tweet->id }}" method="POST">
                        @csrf
                        {{ method_field('DELETE')}}
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                @endif
        </div>
    </div>
</article>
