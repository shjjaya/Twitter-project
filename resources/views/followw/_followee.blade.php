<div class="card mb-2">
    <div class="card-body">
        <div class="row">
            <div class="col-9">
                {{ $user->first_name }} {{ $user->last_name }}
            </div>
            <div class="col-3 text-right">
                @include('widgets._follow_user_button')
            </div>
        </div>
    </div>
</div>
