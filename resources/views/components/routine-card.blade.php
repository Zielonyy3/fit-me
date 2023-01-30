<div class="{{$class}}"
     data-name="{{$routine->name}}"
     data-id="{{$routine->getKey()}}">
    <div class="routine-card card">
        <!-- Photo -->
        <div class="img-responsive img-responsive-21x9 card-img-top"
             style="background-image: url({{$routine->preview_image}})"></div>
        <div class="card-body">
            <h3 class="card-title">{{$routine->name}}</h3>
            @if($showDescription)
                <p class="text-muted">{{mb_substr($routine->description, 0, 100)}}</p>
            @endif
        </div>
        @if($showFooter)
            <div class="card-footer">
                <div class="d-flex">
                    <a href="{{route('routines.show', $routine)}}"
                       class="btn btn-primary ms-auto">{{__('common.edit')}}</a>
                </div>
            </div>
        @endif
    </div>

</div>
