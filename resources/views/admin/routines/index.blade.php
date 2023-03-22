@extends('layouts.backend')

@section('title', __('common.routines'))

@section('content')
    <x-ui.card-container title="{{__('common.routines')}}">
        <div class="row mb-3">
            <div class="col-md-12">
                <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#create-routine-modal">
                    <i class="ti ti-plus"></i>
                    <span class="text">{{__('common.add_routine')}}</span>
                </a>
            </div>
        </div>
        <livewire:routines.routine-table />
    </x-ui.card-container>
@endsection

@section('modals')
    @include('admin.routines.modals.create')
@endsection
