@extends('layouts.backend')

@section('title', __('common.exercises'))

@section('content')
    <x-ui.card-container title="{{__('common.clients')}}">
        <livewire:users.user-table />
    </x-ui.card-container>
@endsection
