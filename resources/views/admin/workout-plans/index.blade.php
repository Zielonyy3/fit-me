@extends('layouts.backend')

@section('title', __('common.workout_plans'))

@section('content')
    <x-ui.card-container title="{{__('common.workout_plans')}}">
        <div class="row mb-3">
            <div class="col-md-12">
                <a href="#" class="btn btn-secondary"
                   data-bs-toggle="modal" data-bs-target="#create-workout-plan-modal">
                    <i class="ti ti-plus"></i>
                    <span class="text">{{__('common.add_workout_plan')}}</span>
                </a>
            </div>
        </div>
        <livewire:workout-plans.workout-plan-table/>
    </x-ui.card-container>
@endsection

@section('modals')
    @include('admin.workout-plans.modals.create')
@endsection
