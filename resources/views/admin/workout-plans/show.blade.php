@extends('layouts.backend')

@section('title', __('common.edit_workout_plan'))

@section('content')
    <x-ui.card-container :title="$workoutPlan->name">
        <x-slot:openForm>
            {!!Form::model($workoutPlan, [
            'method' => 'PATCH',
            'url' => route('workout-plans.update', $workoutPlan),
            'id' => 'update-workout-plan-form'
            ]) !!}
        </x-slot:openForm>

        <div class="row">
            <div class="col-6">
                <div class="row justify-content-center border-bottom">
                    <div class="form-group col-12{{ $errors->has('name') ? ' has-error' : ''}}">
                        {!! Form::label('name', __('common.name'), ['class' => 'control-label']) !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group col-12{{ $errors->has('description') ? ' has-error' : ''}}">
                        {!! Form::label('description', __('common.description'), ['class' => 'control-label']) !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '4']) !!}
                        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-4 mb-2">
                        <livewire:planned-routines :workoutPlan="$workoutPlan"/>
                    </div>
                </div>
            </div>
            <div class="col-6 border-left">
                @php
                    $cardParams = [
                        'showFooter' => false,
                        'showDescription' => false
                        ]
                @endphp
                <livewire:search-grid class="App\Http\Livewire\SearchGrids\SearchGridRoutine"
                                      :cardParams="$cardParams"/>
            </div>
        </div>

        <x-slot:footer>
            <button id="submit-btn" class="btn btn-primary d-flex align-items-center" type="submit">
                {{__('common.save')}}
                <span class="ml-2 spinner spinner-border spinner-border-sm d-none" role="status"
                      aria-hidden="true"></span>
            </button>
        </x-slot:footer>
        <x-slot:closeForm>
            {!! Form::close() !!}
        </x-slot:closeForm>
    </x-ui.card-container>
@endsection

@push('modals')
    <div class="modal modal-blur fade" id="add-routine-modal" tabindex="-1" aria-hidden="true">
        <livewire:planned-routines.modal :workoutPlan="$workoutPlan"/>
    </div>
@endpush

@push('scripts')
    <script>

    </script>
@endpush
