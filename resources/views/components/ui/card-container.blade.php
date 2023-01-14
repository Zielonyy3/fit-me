@props(['title' => 'title', 'class' => ''])

<div class="card {{$class}}">
    @isset($openForm)
        {{$openForm}}
    @endisset
    <div class="card-header">
        <h3 class="card-title">{{$title}}</h3>
    </div>
    <div class="card-body">
        {{$slot}}
    </div>
    @isset($footer)
        <div class="card-footer">
            {{$footer}}
        </div>
    @endisset
    @isset($closeForm)
        {{$closeForm}}
    @endisset
</div>
