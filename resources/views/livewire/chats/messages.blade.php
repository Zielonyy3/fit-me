<div wire:poll.5000ms class="card border-0" style="height: 28rem">
    <div class="card-body p-0 card-body-scrollable card-body-scrollable-shadow d-flex flex-column" id="chat-messages">
        @if(!empty($messages))
            @if(!$isWholeConversationLoaded)
                <button class="btn btn-dark py-2" wire:click="incrementPage">{{__('common.load_older')}}</button>
            @endif
            @foreach($messages as $message)
                <x-chats.single-message :message="$message"/>
            @endforeach
        @endif
    </div>

    <script>
        window.addEventListener('DOMContentLoaded', (e) => {
            Livewire.on('updatedMessages', function () {
                const chatMessages = document.getElementById('chat-messages');
                chatMessages.scrollTop = chatMessages.scrollHeight + 1000;
            });
        });
    </script>
</div>
