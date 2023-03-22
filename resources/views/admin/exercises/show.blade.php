@extends('layouts.backend')

@section('title', __('common.edit_exercise'))

@section('content')
    <div class="row">
        {!!Form::model($exercise, [
    'method' => 'PATCH',
    'url' => route('exercises.update', $exercise),
    'id' => 'update-exercise-form'
    ]) !!}
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
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '6']) !!}
                        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

            </div>
            <div class="col-6 border-left">
                <img src="{{$exercise->preview_image}}" alt="{{$exercise->name}}" class="w-100">
            </div>

        </div>
        <div class="row my-4">
            <div class="col-md-2">
                <button id="submit-btn" class="btn btn-primary d-flex align-items-center" type="submit">
                    {{__('common.save')}}
                    <span class="ml-2 spinner spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                </button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection

