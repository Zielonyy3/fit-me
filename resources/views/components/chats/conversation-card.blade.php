@php($participant = $conversation->getParticipants()->first())
<div class="conversation-card group-label d-flex align-items-center justify-content-between">
    {{--                    <span class="avatar me-3" style="background-image: url('{{asset('img/user_profile.jpeg')}}')"></span>--}}
    <span class="avatar avatar-sm avatar-rounded me-3" style="background-image: url('{{asset('img/user_profile.jpeg')}}')"></span>
    <div class="d-flex align-items-center justify-content-between flex-grow-1">
        <div class="font-weight-medium">{{$participant->name}}</div>
        <button class="btn btn-sm btn-danger">{{__('common.leave')}}</button>
    </div>

</div>
