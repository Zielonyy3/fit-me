@extends('layouts.backend')

@section('title', __('common.chat'))

@section('content')
    @php
        $conversationId = 1;
    @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="mb-2 col-md-3">
                <x-chats.conversations/>
            </div>
            <div class="mb-2 col-md-6">
                <x-ui.card-container
                    title="{{__('common.conversations')}}"
                    card-body-class="p-0">
                    @if($conversationId)
                        <div class="w-100">
                            <x-chats.messages />
                            {{--<chat-messages :conversation="{{ $conversationId }}"></chat-messages>--}}
                        </div>
                    @endif
                    <x-slot:footer>
                        <x-chats.form/>
                    </x-slot:footer>
                </x-ui.card-container>
            </div>
            <div class="mb-2 col-md-3">
                @if($conversationId)
                    <conversation-participants :conversation="{{ $conversationId }}"></conversation-participants>
                @endif
            </div>
        </div>
    </div>
@endsection
