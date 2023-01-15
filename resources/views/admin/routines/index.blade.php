@extends('layouts.backend')

@section('title', __('common.routines'))

@section('content')
    <x-ui.card-container title="{{__('common.routines')}}">
        <livewire:routines.routine-table />
    </x-ui.card-container>
@endsection
