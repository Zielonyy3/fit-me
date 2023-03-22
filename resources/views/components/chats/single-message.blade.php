@props(['message', 'isMyMessage' => false])
@php
    /**
     * @var \Musonza\Chat\Models\Message $message
     */
        $user = $message->getSenderAttribute();
        $isMyMessage = $message->is_sender;
        $borderClasses = $isMyMessage ? 'border-right-0 align-self-end' :' border-left-0';
        $borderRadius =  $isMyMessage ? '15px 0 0 15px' :'0 15px 15px 0';
        $paddings =  $isMyMessage ? 'ps-3 pe-2' :'ps-2 pe-3';

@endphp
<div class="single-message border {{$borderClasses}} {{$paddings}} py-2 my-1"
     style="width: 80%; border-radius: {{$borderRadius}};">
    <div class="row">
        @if(!$isMyMessage)
            <div class="col-auto">
                @if($user->profile_picture)
                    <span class="avatar  avatar-rounded me-3"
                          style="background-image: url('{{$user->profile_picture}}')">
                </span>
                @else
                    <span class="avatar">{{$user->initials}}</span>
                @endif
            </div>
        @endif
        <div class="col">
            <div class="message-body">
                {{$message->body}}
            </div>
            <div @class([
            'text-muted',
            'd-flex justify-content-end' => $isMyMessage])>
                yesterday
            </div>
        </div>
        @if(!$isMyMessage && !$message->is_seen)
            <div class="col-auto align-self-center">
                <div class="badge bg-primary"></div>
            </div>
        @endif
    </div>
</div>
