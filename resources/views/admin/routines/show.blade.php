@extends('layouts.backend')

@section('title', __('common.edit_routine'))

@section('content')
    <div class="row">
        {!!Form::model($routine, [
    'method' => 'PATCH',
    'url' => route('routines.update', $routine),
    ]) !!}
        @include('admin.routines.form')
        {!! Form::close() !!}
    </div>
@endsection
