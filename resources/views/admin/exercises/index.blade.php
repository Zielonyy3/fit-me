@extends('layouts.backend')

@section('title', __('common.exercises'))

@section('content')
    <x-ui.card-container title="{{__('common.exercises')}}">
        <livewire:exercises.exercise-table />
    </x-ui.card-container>
@endsection
