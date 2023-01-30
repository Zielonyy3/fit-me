<div class="{{$class}}"
     data-name="{{$exercise->name}}"
     data-id="{{$exercise->getKey()}}">
    <div class="card exercise-card">
        <!-- Photo -->
        <div class="img-responsive img-responsive-21x9 card-img-top"
             style="background-image: url({{$exercise->preview_image}})"></div>
        <div class="card-body">
            <h3 class="card-title">{{$exercise->name}}</h3>
            <p class="text-muted">{{mb_substr($exercise->description, 0, 100)}}</p>
        </div>
    </div>
</div>
