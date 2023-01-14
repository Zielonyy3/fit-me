<div class="modal modal-blur fade" id="add-routine-modal" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            @if(!empty($routine))
                {!!Form::model($routine, [
                    'method' => 'PATCH',
                    'url' => route('routines.update', $routine),
                    'id' => 'update-routine-form'
                    ]) !!}
            @endif
            <div class="modal-header">
                <h5 class="modal-title">{{__('common.add_routine')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="form-group col-12{{ $errors->has('name') ? ' has-error' : ''}}">
                                {!! Form::label('name', __('common.workout_plan_name'), ['class' => 'form-label']) !!}
                                {!! Form::text('name', null, ['class' => 'form-control', ]) !!}
                                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group col-6{{ $errors->has('start_day') ? ' has-error' : ''}}">
                                {!! Form::label('start_day', __('common.start_day'), ['class' => 'form-label']) !!}
                                {!! Form::number('start_day', null, ['class' => 'form-control', 'required' => true]) !!}
                                {!! $errors->first('start_day', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group col-6{{ $errors->has('end_day') ? ' has-error' : ''}}">
                                {!! Form::label('end_day', __('common.end_day'), ['class' => 'form-label']) !!}
                                {!! Form::number('end_day', null, ['class' => 'form-control', 'required' => true]) !!}
                                {!! $errors->first('end_day', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group col-12{{ $errors->has('notes') ? ' has-error' : ''}}">
                                {!! Form::label('notes', __('common.notes'), ['class' => 'form-label']) !!}
                                {!! Form::textarea('notes', null, ['class' => 'form-control', 'rows' => '3']) !!}
                                {!! $errors->first('notes', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary"
                        data-dismiss="modal">{{__('common.cancel')}}</button>
                <button type="button" class="btn btn-primary ms-auto" data-dismiss="modal">{{__('common.add')}}</button>
            </div>
            @if(!empty($routine))
                {!! Form::close() !!}
            @endif
        </div>
    </div>
</div>
