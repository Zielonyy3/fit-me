@props(['conversation', 'isActive' => false])
@php
    $participant = $conversation->getParticipants()->first(function ($user) {
        return $user->getKey() != \Illuminate\Support\Facades\Auth::user()->getKey();
    });
    $unreadNotifications = $conversation->unreadNotifications(\Illuminate\Support\Facades\Auth::user())->count();
    if($unreadNotifications > 9) {
        $unreadNotifications = '9+';
    }
@endphp

<div
    class="conversation-card group-label d-flex align-items-center justify-content-between mb-2 cursor-pointer {{$isActive? ' active-card':''}}"
    data-conversation-id="{{$conversation->getKey()}}"
>
    {{--                    <span class="avatar me-3" style="background-image: url('{{asset('img/user_profile.jpeg')}}')"></span>--}}
    <span class="avatar avatar-sm avatar-rounded me-3"
          style="background-image: url('{{asset('img/user_profile.jpeg')}}')"></span>
    <div class="d-flex align-items-center justify-content-between flex-grow-1">
        <div class="font-weight-medium">{{$participant->name}}</div>
        {{--        <button class="btn btn-sm btn-danger">{{__('common.leave')}}</button>--}}
    </div>
    @if($unreadNotifications)
        <span class="badge bg-blue badge-notification badge-pill">{{$unreadNotifications}}</span>
    @endif
</div>
