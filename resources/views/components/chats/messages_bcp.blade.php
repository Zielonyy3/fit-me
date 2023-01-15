<div>
    <button class="btn btn-danger btn-sm float-right" @click="deleteMessages()">Delete Messages</button>
    <br />
    <br />
    <ul class="chat">
        <li
            :class="[currentUser.id == message.sender.id ? 'right' : 'left']"
            class="clearfix mb-1"
            v-for="(message, index) in messages.data"
            :key="index"
        >
            <div class="chat-body clearfix">
                <div v-if="currentUser.id != message.sender.id" class="header">
                    {{--                    <strong class="primary-font">{{ message.sender.name }}</strong>--}}
                    <strong class="primary-font">name</strong>
                </div>
                <p>body</p>
            </div>
        </li>
    </ul>
</div>
