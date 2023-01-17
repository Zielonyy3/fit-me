<div>
    <div class="input-group py-3">
        <input
            id="btn-input"
            type="text"
            name="message"
            class="form-control input-sm"
            placeholder="{{__('common.type_your_message')}}"
            wire:click="markConversationAsRead"
            wire:model.defer="message"
        >
        <span class="input-group-btn">
        <button class="btn btn-primary" id="btn-chat" wire:click="sendMessage">Send</button>
      </span>
    </div>
{{--        <div >--}}
{{--            <button class="btn mt-3 btn-success btn-sm" >Join Conversation</button>--}}
{{--        </div>--}}
</div>
