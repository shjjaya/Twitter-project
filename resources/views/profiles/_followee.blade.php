<div class="card">
    <div class="card-body d-flex allign-items-center justify-content" >
        <div class="d-flex allign-item-center">
            <a href="/profiles/{{ $user->id }}" class="rounded img-thumbnail mr-2" style="width:64px; height:64px;"></a>
            <h5 class="card-title">{{ $user->name }}</h5>

        </div>
        <div>
            @if($user->followed_by_user)
            <a href="/profiles/{{ $user->id }}/unfollow" class="btn btn-danger" style="align:right;">Unfollow</a>
         @else
         <a href="/profiles/{{ $user->id }}/follow" class="btn btn-primary" style="align:right;">Follow</a>
            @endif
        </div>
    </div>
</div>
