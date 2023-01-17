@extends('layouts.backend')

@section('title', __('common.chat'))

@section('content')
    @php($conversationId= $directConversations->first()->getKey())
    <div class="container">
        <div class="row justify-content-center">
            <div class="mb-2 col-md-3">
                <livewire:chats.conversations/>
            </div>
            <div class="mb-2 col-md-9">
                <x-ui.card-container
                    title="{{__('common.conversations')}}"
                    card-body-class="p-0">
                        <div class="w-100">
                            <livewire:chats.messages :conversationId="$conversationId"/>
                        </div>
                    <x-slot:footer>
                        <livewire:chats.form :conversationId="$conversationId" />
                    </x-slot:footer>
                </x-ui.card-container>
            </div>
{{--            <div class="mb-2 col-md-3">--}}
{{--                @if($conversationId)--}}
{{--                    <conversation-participants :conversation="{{ $conversationId }}"></conversation-participants>--}}
{{--                @endif--}}
{{--            </div>--}}
        </div>
    </div>
@endsection
