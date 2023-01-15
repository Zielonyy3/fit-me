<div class="card card-default">
    <div class="card-header">Conversations</div>
    <div class="card-body">
        <button class="btn btn-primary btn-sm" @click="createConversation()">New Conversation</button>
        <br />
        <br />
        <ul class="conversation">
            <li class="clearfix py-2 border-bottom" v-for="(convo, index) in conversations" :key="index">
                <div class="chat-body clearfix">
                    <div class="header">
                        <a href="#" @click="showConversation(convo.id)">
{{--                            <strong class="primary-font">Conversation {{ convo.id }}</strong>--}}
                            <strong class="primary-font">Conversation 99</strong>
                        </a> |
{{--                        <a--}}
{{--                            v-if="!isParticipant(convo.id)"--}}
{{--                            href="#"--}}
{{--                            class="text-success"--}}
{{--                            @click="joinConversation(convo.id)"--}}
{{--                        >--}}
{{--                            <strong>Join</strong>--}}
{{--                        </a>--}}
{{--                        <a--}}
{{--                            v-else--}}
{{--                            href="#"--}}
{{--                            class="text-danger"--}}
{{--                            title="leave conversation"--}}
{{--                            @click="leaveConversation(convo.id)"--}}
{{--                        >--}}
                            <strong>Leave</strong>
                        </a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
