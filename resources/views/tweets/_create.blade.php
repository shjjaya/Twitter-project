<h1 class="title">Create Tweet</h1>
    <form action="/tweets" method="post">
        @csrf
        <div class="form-group">
            <input type="text" name="body" class="form-control" placeholder="What's on your mind" value="{{ old('body') }}">
        </div>
        <div class="form-group">
           @if($errors->any())
               <ul class="alert alert-danger">
                   @foreach($errors->all() as $error)
                   <li>{{ $error }}
                   </li>
                   @endforeach
               </ul>
           @endif
               <button type="submit" class="btn btn-primary">Tweet!</button>
        </div>
    </form>
