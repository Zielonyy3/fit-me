<div class="modal modal-blur fade" id="create-routine-modal" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            {!! Form::open(['route' => 'routines.store']) !!}
            <div class="modal-header">
                <h5 class="modal-title">{{__('common.add_routine')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-8">
                        <div class="row">
                            <div class="form-group col-12{{ $errors->has('routine_name') ? ' has-error' : ''}}">
                                {!! Form::label('name', __('common.routine_name'), ['class' => 'control-label']) !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'required' => true]) !!}
                                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <img src="https://via.placeholder.com/400" alt="Routine photo" class="w-100">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary" data-dismiss="modal">{{__('common.cancel')}}</button>
                {!! Form::submit(__('common.add_routine'), ['class' => 'btn btn-primary ms-auto']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
