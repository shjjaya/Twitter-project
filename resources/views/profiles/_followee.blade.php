<div class="list-group-item">
    <a href="/follower/{{ $profile->id }}/tweet">{{ $tweet->followed_by_user ? 'unfollow' : 'follower' }}
        ({{ $tweet->follower->count() }} ) - </a>

</div>
