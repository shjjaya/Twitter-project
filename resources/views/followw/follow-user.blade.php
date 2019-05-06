@if($user->following_user)
<a href="/unfollow/{{ $user->id }}" class="btn btn-primary">Unfollow</a>
@else
<a href="/follow/{{ $user->id }}" class="btn btn-primary">Follow</a>
@endif



 
