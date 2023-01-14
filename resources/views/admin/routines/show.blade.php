@extends('layouts.backend')

@section('title', __('common.edit_routine'))

@section('content')
    <div class="row">
        {!!Form::model($routine, [
    'method' => 'PATCH',
    'url' => route('routines.update', $routine),
    'id' => 'update-routine-form'
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
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '4']) !!}
                        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-4 mb-2">
                        <h5>{{__('common.planned_exercises')}}</h5>
                    </div>
                    <div id="planned-exercises-container" class="col-12 pb-2" style="min-height: 50px">
                        <x-ui.spinning-loader class="mt-5"/>
                    </div>
                </div>
            </div>
            <div class="col-6 border-left">
                <livewire:search-grid class="App\Http\Livewire\SearchGrids\SearchGridExercise"/>
            </div>

        </div>
        <div class="row">
            <div class="col-md-2">
                <button id="submit-btn" class="btn btn-primary d-flex align-items-center" type="submit">
                    {{__('common.save')}}
                    <span class="ml-2 spinner spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    <span class="spinner sr-only">Loading...</span>
                </button>
            </div>

        </div>

        {!! Form::close() !!}
    </div>
@endsection

@push('scripts')
    <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Authorization': 'Bearer ' + $('meta[name="api_token"]').attr('content'),
                }
            });

            const draggableCardContainer = document.querySelector('.draggable-cards-container')
            const plannedExercisesContainer = document.querySelector('#planned-exercises-container')

            function getPlannedExercises() {
                let url = '{{route('routines.planned-exercises.index', $routine)}}'
                $.ajax(url)
                    .done(function (res) {
                        if (res.success) {
                            $(plannedExercisesContainer).html('');
                            res.data.forEach(exercise => {
                                $(plannedExercisesContainer).append(
                                    PlannedExercise.render({
                                        plannedExerciseId: exercise.id,
                                        exerciseId: exercise.exercise_id,
                                        name: exercise.name,
                                        sets: exercise.sets,
                                        target_type: exercise.target_type,
                                        target: exercise.target,
                                        rest_time: exercise.rest_time
                                    })
                                );
                            })
                            removeDeleteButtonIfEmpty();
                            refreshSortableContainer();
                            // toastr.success(res.message);

                        } else {
                            // toastr.error(res.message);
                        }
                    })
                    .fail(function (res) {
                            // toastr.error(res.statusText);
                        }
                    );
            }

            function updatePlannedExercises(setVar = false) {
                function getData() {
                    data = [];
                    $('.planned-exercise').each(function (index) {
                        const elementData = PlannedExercise.getData($(this))
                        data.push({
                            id: elementData.planned_exercise_id,
                            exercise_id: elementData.exercise_id,
                            sets: elementData.sets,
                            target_type: elementData.target_type,
                            target: elementData.target,
                            rest_time: elementData.rest_time,
                            order: index,
                        });
                    })
                    return data;
                }

                return new Promise((resolve, reject) => {
                    $.ajax({
                        url: '{{route('routines.update-planned-exercises', $routine)}}',
                        type: 'POST',
                        data: JSON.stringify(getData()),
                    }).done(res => {
                        resolve();
                    }).fail(err => {
                        reject(err);
                    })
                });
            }

            function refreshSortableContainer() {
                const sortablePlannedExercises = Sortable.create(document.getElementById('planned-exercises-container'), {
                    handle: '.handle',
                    animation: 300,
                    swapThreshold: 0.2,
                    dataIdAttr: 'data-id',
                    chosenClass: "sortable-chosen",
                    dragClass: "sortable-drag",
                    onEnd: function (evt) {
                        updatePlannedExercises();
                    },
                    group: {
                        name: 'shared',
                        pull: 'clone',
                    },
                });

                const sortableExerciseCards = new Sortable(draggableCardContainer, {
                    dataIdAttr: 'data-id',
                    sort: false,
                    group: {
                        name: 'shared',
                        pull: 'clone',
                        put: false
                    },
                    onMove: function (evt) {
                        if (evt.from === evt.to) {
                            return false;
                        }
                        const exerciseId = $(evt.dragged).attr('data-id')
                        const name = $(evt.dragged).attr('data-name')

                        $(evt.dragged)
                            .removeClass()
                            .addClass('card planned-exercise col-12 my-1')
                            .attr('data-exercise-id', exerciseId)
                            .attr('data-name', name)
                            .html(
                                PlannedExercise.render({exerciseId, name}).html()
                            )
                    },
                    onEnd: function (evt) {
                        $(draggableCardContainer).find('.planned-exercise').each(function () {
                            $(this).remove();
                        })
                        removeDeleteButtonIfEmpty();
                        updatePlannedExercises();
                    },
                });
            }

            function removeDeleteButtonIfEmpty() {
                const $plannedExercises = $(plannedExercisesContainer).find('.planned-exercise');
                if ($plannedExercises.length <= 1) {
                    $plannedExercises.find('.delete-exercise-btn').hide();
                } else {
                    $plannedExercises.each(function () {
                        console.log($(this).find('.delete-exercise-btn'));
                        $(this).find('.delete-exercise-btn').show();
                    })
                }
            }

            function deletePlannedExercise() {
                const $button = $(this);
                let url = '{{route('planned-exercises.update', '__ID__')}}'
                const $plannedExercise = $button.closest('.planned-exercise')
                $plannedExercise.remove();
                removeDeleteButtonIfEmpty();
                const id = $plannedExercise.attr('data-planned-exercise-id')
                $.ajax({
                    url: url.replace('__ID__', id),
                    type: 'DELETE',
                }).done(function (res) {
                    if (res.success) {
                        console.log('success');
                        // toastr.success(res.message);
                    } else {
                        // toastr.error(res.message);
                    }
                }).fail(function (res) {
                        // toastr.error(res.statusText);
                    }
                ).always(function () {
                });
            }

            $(document).on('click', '.delete-exercise-btn', deletePlannedExercise)

            const $updateRoutineForm = $('#update-routine-form');
            let isUpdatedBeforeSubmit = false;
            $updateRoutineForm.on('submit', async function (e) {
                $('.spinner').show();
                if (!isUpdatedBeforeSubmit) {
                    e.preventDefault();
                    await updatePlannedExercises();
                }
                isUpdatedBeforeSubmit = true
                $updateRoutineForm.submit()
            })

            $('.spinner').hide();
            getPlannedExercises();
        })
    </script>
@endpush

