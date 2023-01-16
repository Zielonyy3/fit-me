@props(['directConversations','selectedConversationId' => null])
<x-ui.card-container title="{{__('common.conversations')}}">
    <div class="row mb-3">
        <div class="col-12">
            <button class="btn btn-primary btn-sm" @click="createConversation()">New Conversation</button>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @foreach($directConversations as $conversation)
                @php($isActive = $conversation->getKey() === $selectedConversationId)
                <x-chats.conversation-card :is-active="$isActive" :conversation="$conversation"/>
            @endforeach
        </div>
    </div>

</x-ui.card-container>

<script>
    window.addEventListener('DOMContentLoaded', (e) => {
        $(document).on('click', '.conversation-card', function () {
            Livewire.emit('conversationSelected', $(this).attr('data-conversation-id'));

            $('.conversation-card').removeClass('active-card');
            $(this).addClass('active-card');
        })
    });
</script>
