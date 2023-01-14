<div class="modal modal-blur fade" id="create-workout-plan-modal" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            {!! Form::open(['route' => 'workout-plans.store']) !!}
            <div class="modal-header">
                <h5 class="modal-title">{{__('common.add_workout_plan')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-8">
                        <div class="row">
                            <div class="form-group col-12{{ $errors->has('name') ? ' has-error' : ''}}">
                                {!! Form::label('name', __('common.workout_plan_name'), ['class' => 'form-label']) !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'required' => true]) !!}
                                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group col-12{{ $errors->has('description') ? ' has-error' : ''}}">
                                {!! Form::label('description', __('common.description'), ['class' => 'form-label']) !!}
                                {!! Form::textarea('description', null, ['class' => 'form-control', 'required' => true]) !!}
                                {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <img src="https://via.placeholder.com/400" alt="Workout plan photo" class="w-100">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary" data-dismiss="modal">{{__('common.cancel')}}</button>
                {!! Form::submit(__('common.add_workout_plan'), ['class' => 'btn btn-primary ms-auto']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
