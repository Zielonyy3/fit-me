@php
    $participations = \Chat::conversations()->setParticipant(\Illuminate\Support\Facades\Auth::user())->get();
@endphp
<x-ui.card-container title="{{__('common.conversations')}}">
    <div class="row mb-3">
        <div class="col-12">
            <button class="btn btn-primary btn-sm" @click="createConversation()">New Conversation</button>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @foreach($participations as $participation)
                <x-chats.conversation-card :conversation="$participation->conversation"/>
            @endforeach
        </div>
    </div>

</x-ui.card-container>
