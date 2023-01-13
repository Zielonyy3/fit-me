<div class="row">
    <div class="col-5">
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
        <div id="planned-exercises-container" class="row py-2">

        </div>
    </div>
    <div class="col-7">
        <livewire:exercises-grid/>
    </div>

</div>

@push('scripts')
    <script>
        $(function() {
            $('#planned-exercises-container').append(PlannedExercise.render(1, 'Test1'))
                .append(PlannedExercise.render(1, 'Test2'))
                .append(PlannedExercise.render(2, 'Test3'))
                .append(PlannedExercise.render(3, 'Test4'))
            function refreshSortableContainer() {
                sortable = Sortable.create(document.getElementById('planned-exercises-container'), {
                    handle: '.handle',
                    animation: 300,
                    swapThreshold: 0.2,
                    dataIdAttr: 'data-id',
                    chosenClass: "sortable-chosen",
                    dragClass: "sortable-drag",
                    onEnd: function (evt) {
                        console.log('end');
                        console.log(evt.clone)
                        // updateCourseSections()
                    },
                    group: {
                        name: 'shared',
                        pull: 'clone' // To clone: set pull to 'clone'
                    },
                });

                new Sortable(document.querySelector('.draggable-cards-container') , {
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
                        $(evt.dragged)
                            .removeClass()
                            .addClass('card planned-exercise col-12 my-1')
                            .attr('data-id', 10)
                            .html(
                                PlannedExercise.render(1, 'Test2').html()
                            )
                    },

                    // onEnd: function (evt) {
                    //     console.log('end');
                    //     console.log(evt.clone)
                    //     evt.clone = `<div class="card planned-exercise col-12 my-1" data-id="1" style="">
                    //     <div class="row card-header border-0">
                    //         <div class="d-flex align-items-center col-md-8">
                    //             <i class="handle fa-solid fa-bars" style="cursor: pointer;"></i>
                    //             <p class="m-0 ml-3 section-name">Test1</p>
                    //         </div>
                    //         <div class="d-flex justify-content-end col-md-4">
                    //
                    //         </div>
                    //     </div>
                    // </div>`
                    //     // updateCourseSections()
                    // },

                });
            }



            refreshSortableContainer();

        })
    </script>
@endpush
