@extends('layouts.backend')
@section('title', __('Dashboard'))

@section('content')
<div class="row">
    <div class="col-12">
        <a href="#" class="btn btn-success btn-icon-split"
           data-toggle="modal" data-target="#addRoutineModal">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
            <span class="text">{{__('common.add_routine')}}</span>
        </a>
    </div>


    <!-- Modal -->
</div>
@endsection

@section('modals')
    @include('admin.routines.modals.add_routine')
@endsection
