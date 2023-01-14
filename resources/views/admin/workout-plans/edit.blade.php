@extends('layouts.backend')

@section('title', __('common.routine'))

@section('content')
    <div class="row">
        <div class="col-4">
            <div class="row">
                <div class="form-group border col-12{{ $errors->has('description') ? ' has-error' : ''}}">
                    {!! Form::label('description', __('common.description'), ['class' => 'control-label']) !!}
                    {!! Form::text('description', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="row">
                <h5 class="card-title">Card title</h5>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-8"></div>
    </div>
@endsection

@section('modals')
    @include('admin.home.modals.add_routine')
@endsection
