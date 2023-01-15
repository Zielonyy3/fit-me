@props(['isMyMessage' => false])
@php
    $borderClasses = $isMyMessage ? 'border-right-0 align-self-end' :' border-left-0';
    $borderRadius =  $isMyMessage ? '15px 0 0 15px' :'0 15px 15px 0';
    $paddings =  $isMyMessage ? 'ps-3 pe-2' :'ps-2 pe-3';
@endphp
<div class="single-message border {{$borderClasses}} {{$paddings}} py-2 my-1"
     style="width: 80%; border-radius: {{$borderRadius}};">
    <div class="row">
        @if(!$isMyMessage)
            <div class="col-auto">
                <span class="avatar">JL</span>
            </div>
        @endif
        <div class="col">
            <div class="">
                <strong>Jeffie Lewzey</strong> commented on your <strong>"I'm not a witch."</strong> post.
            </div>
            <div @class([
            'text-muted',
            'd-flex justify-content-end' => $isMyMessage])>
                yesterday
            </div>
        </div>
        @if(!$isMyMessage)
            <div class="col-auto align-self-center">
                <div class="badge bg-primary"></div>
            </div>
        @endif
    </div>
</div>
