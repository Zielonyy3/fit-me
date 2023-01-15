<div class="card card-default">
    <div class="card-header">Participants</div>
    <div class="card-body">
        <ul class="chat">
            <li class="left clearfix border-bottom py-1" v-for="(participant, index) in participants" :key="index">
                <div class="chat-body clearfix">
                    <div class="d-flex align-items-center header">
                        <div class="primary-font participant-name">{{ participant.name }}</div>
                        <div class="primary-font participant-name">name</div>

                        {{--                    <span class="participant-type pl-1"> ({{ participant.participation[0].messageable_type}})</span>--}}
                        <span class="participant-type pl-1"> type</span>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
