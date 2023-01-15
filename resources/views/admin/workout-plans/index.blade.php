@extends('layouts.backend')

@section('title', __('common.workout_plans'))

@section('content')
    <x-ui.card-container title="{{__('common.workout_plans')}}">
        <livewire:exercises.exercise-table />
    </x-ui.card-container>
@endsection
