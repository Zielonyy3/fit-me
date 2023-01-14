@extends('layouts.backend')
@section('title', __('Dashboard'))

@section('content')
<div class="row">
    <div class="col-12">
        <a href="#" class="btn btn-success btn-icon-split"
           data-toggle="modal" data-target="#addRoutineModal" />
            <a href="#" class="btn btn-primary btn-icon-split"
               data-toggle="modal" data-target="#addExerciseModal" />
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
            <span class="text">{{__('common.add_routine')}}</span>
        </a>
    </div>
    <div class="col-12">
        <livewire:search-grid class="App\Http\Livewire\SearchGrids\SearchGridRoutine"/>
    </div>


    <!-- Modal -->
</div>
@endsection

@section('modals')
    @include('admin.routines.modals.create')
    @include('admin.exercises.modals.create')
@endsection
