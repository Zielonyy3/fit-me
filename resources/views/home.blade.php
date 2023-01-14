@extends('layouts.backend')

@section('title', __('Dashboard'))

@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#create-routine-modal">
                <i class="ti ti-plus"></i>
                <span class="text">{{__('common.add_routine')}}</span>
            </a>
            <a href="#" class="btn btn-primary btn-icon-split"
               data-toggle="modal" data-target="#create-exercise-modal">
                <i class="ti ti-plus"></i>
                <span class="text">{{__('common.add_exercise')}}</span>
            </a>
            <a href="#" class="btn btn-secondary btn-icon-split"
               data-toggle="modal" data-target="#create-workout-plan-modal">
                <i class="ti ti-plus"></i>
                <span class="text">{{__('common.add_workout_plan')}}</span>
            </a>
        </div>
    </div>
    <div class="row mb-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{__('common.clients')}}</h3>
            </div>
            <div class="card-body">
                <div class="row row-cards">
                    @foreach(\App\Models\User::all() as $user)
                        <div class="col-md-6 col-xl-3">
                            <x-users.small-card :user="$user"/>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <livewire:search-grid class="App\Http\Livewire\SearchGrids\SearchGridRoutine"/>
        </div>
    </div>
@endsection

@section('modals')
    @include('admin.routines.modals.create')
    @include('admin.exercises.modals.create')
    @include('admin.workout-plans.modals.create')
@endsection
