<div>
    <div class="input-group" v-if="isParticipant()">
        <input
            id="btn-input"
            type="text"
            name="message"
            class="form-control input-sm"
            placeholder="Type your message here..."
            v-model="newMessage"
            @keyup.enter="sendMessage"
        >
        &nbsp;&nbsp;
        <span class="input-group-btn">
        <button class="btn btn-primary" id="btn-chat" @click="sendMessage">Send</button>
      </span>
    </div>
    <div v-else>
        <button class="btn mt-3 btn-success btn-sm" @click="joinConversation()">Join Conversation</button>
    </div>
</div>
