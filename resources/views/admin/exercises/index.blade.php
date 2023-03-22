@extends('layouts.backend')

@section('title', __('common.exercises'))

@section('content')
    <x-ui.card-container title="{{__('common.exercises')}}">
        <div class="row mb-3">
            <div class="col-md-12">
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create-exercise-modal"> <i
                        class="ti ti-plus"></i>
                    <span class="text">{{__('common.add_exercise')}}</span>
                </a>
            </div>
        </div>
        <livewire:exercises.exercise-table />
    </x-ui.card-container>
@endsection

@section('modals')
    @include('admin.exercises.modals.create')
@endsection
