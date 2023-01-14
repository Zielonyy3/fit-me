<x-ui.card-container :title="__('common.planned_routines')">
    <x-workout-plans.add-routine-btn/>

    <div class="row mt-3">
        <div class="col-md-12">
            @foreach($plannedRoutines as $routine)
                <x-workout-plans.planned-routine :routine="$routine"/>
            @endforeach
        </div>
    </div>

</x-ui.card-container>
