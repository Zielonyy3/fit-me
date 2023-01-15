<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        @if(!empty($routine))
            {!!Form::model($routine, [
                'method' => 'POST',
                'url' => route('api.workout-plans.planned-routines.store', $workoutPlan),
                'id' => 'add-routine-form',
                'wire:submit.prevent' => "submitFormAction",
            ]) !!}
        @elseif(!empty($plannedRoutine))
            {!!Form::model($plannedRoutine, [
                'method' => 'POST',
                'url' => route('api.planned-routines.update', $plannedRoutine),
                'id' => 'update-planned-routine-form',
                'wire:submit.prevent' => "submitPlannedRoutineAction",
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
                        @if(!empty($routine))
                            {!! Form::hidden('routine_id', $routine->getKey()) !!}
                        @elseif(!empty($plannedRoutine))
                            {!! Form::hidden('routine_id', $plannedRoutine->routine_id) !!}
                        @endif
                        <div class="form-group col-12{{ $errors->has('name') ? ' has-error' : ''}}">
                            {!! Form::label('name', __('common.workout_plan_name'), ['class' => 'form-label']) !!}
                            @if(!empty($plannedRoutine))
                                {!! Form::text('name', $plannedRoutine->changed_name, ['class' => 'form-control']) !!}
                            @else
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            @endif
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
            <button type="submit" class="btn btn-primary ms-auto" wire:loading.class="disabled"
                    data-dismiss="modal">
                @if(!empty($plannedRoutine))
                    {{__('common.save')}}
                @else
                    {{__('common.add')}}
                @endif
            </button>
        </div>
        @if(!empty($routine))
            {!! Form::close() !!}
        @endif
    </div>
    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            function getAjaxData(formData) {
                return {
                    'routine_id': formData.get('routine_id'),
                    'name': formData.get('name'),
                    'start_day': formData.get('start_day'),
                    'end_day': formData.get('end_day'),
                    'notes': formData.get('notes'),
                }
            }

            Livewire.on('submitFormAddRoutineModal', () => {
                const $form = $('#add-routine-form');
                const formData = new FormData($form.get(0));

                $.ajax({
                    url: $form.attr('action'),
                    type: 'POST',
                    data: getAjaxData(formData)
                }).done(res => {
                    if (res.success) {
                        $('#add-routine-modal').modal('hide');
                        Livewire.emit('plannedRoutinesUpdated')
                    }
                }).fail(err => {
                    console.warn(err)
                })
            })
            Livewire.on('submitPlannedRoutineModal', () => {
                const $form = $('#update-planned-routine-form');
                const formData = new FormData($form.get(0));

                $.ajax({
                    url: $form.attr('action'),
                    type: 'PATCH',
                    data: getAjaxData(formData),
                }).done(res => {
                    if (res.success) {
                        $('#add-routine-modal').modal('hide');
                        Livewire.emit('plannedRoutinesUpdated')
                    }
                }).fail(err => {
                    console.warn(err)
                })
            })
        });
    </script>
</div>
