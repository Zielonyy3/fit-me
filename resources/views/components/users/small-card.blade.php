<a class="card card-link" href="#">
    <div class="card-body">
        <div class="row">
            <div class="col-auto">
                <span class="avatar rounded" @isset($imgUrl)style="background-image: url({{$imgUrl}})"@endisset>
                    @if(empty($imgUrl))
                        {{$user->initials}}
                    @endif
                </span>
            </div>
            <div class="col">
                <div class="font-weight-medium">{{$user->name}}</div>
                <div class="text-muted">6 months ago</div>
            </div>
        </div>
    </div>
</a>
