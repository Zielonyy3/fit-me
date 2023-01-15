@extends('layouts.backend')

@section('title', __('common.edit_user'))

@section('content')
    <x-ui.card-container :title="$user->name">
        <x-slot:openForm>
            {!!Form::model($user, [
                'method' => 'PATCH',
                'url' => route('routines.update', $user),
                'id' => 'update-routine-form'
            ]) !!}
        </x-slot:openForm>
        <div class="row">

            <div class="col-md-4">
                <div class="mb-3">
                    <div class="row">
                        <div class="col-auto">
{{--                                            <span class="avatar avatar-md" style="background-image: url({{$user->image}})"></span>--}}
                                            <span class="avatar avatar-md" style="background-image: url({{asset('img/user_profile.jpeg')}})"></span>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                {!! Form::label('email', __('common.email'), ['class' => 'form-label']) !!}
                                {!! Form::text('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    {!! Form::label('bio', __('common.bio'), ['class' => 'form-label']) !!}
                    {!! Form::textarea('bio', null, ['class' => 'form-control', 'rows' => '5']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('first_name', __('common.first_name'), ['class' => 'form-label']) !!}
                    {!! Form::text('first_name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('last_name', __('common.last_name'), ['class' => 'form-label']) !!}
                    {!! Form::text('last_name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>
            <div class="col-md-8">
                <x-ui.card-container title="{{__('common.workout_plans')}}">
                    <livewire:workout-plans.select-workout-plan :user="$user" />

                    <livewire:users.workout-plans-list :user="$user" />

                </x-ui.card-container>
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


