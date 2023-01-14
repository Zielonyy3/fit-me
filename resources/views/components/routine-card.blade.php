<div class="{{$class}}"
     data-name="{{$routine->name}}"
     data-id="{{$routine->getKey()}}">
    <div class="card exercise-card" style="width: {{$width}}rem;">
        <img src="https://i.imgur.com/ZTkt4I5.jpg" class="card-img-top" alt="img">
        <div class="card-body">
            <h5 class="card-title" style="font-size:1.2em">{{$routine->name}}</h5>
            <h6 class="card-subtitle mb-2 text-muted" style="font-size:.9em">Card subtitle</h6>
            {{--        <p class="card-text">{{mb_substr($exercise->description, 0, 100)}}</p>--}}
            {{--        <a href="#" class="btn mr-2"><i class="fas fa-link"></i> Visit Site</a>--}}
            {{--        <a href="#" class="btn "><i class="fab fa-github"></i> Github</a>--}}
        </div>
    </div>
</div>
