<div class="{{$class}}"
     data-name="{{$exercise->name}}"
     data-id="{{$exercise->getKey()}}">
    <div class="card exercise-card">
        <!-- Photo -->
        <div class="img-responsive img-responsive-21x9 card-img-top" style="background-image: url(https://i.imgur.com/ZTkt4I5.jpg)"></div>
        <div class="card-body">
            <h3 class="card-title">{{$exercise->name}}</h3>
            <p class="text-muted">Card subtitle</p>
        </div>
    </div>
</div>
