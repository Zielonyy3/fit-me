<div class="row d-flex align-items-end">
    <div class="col">
        {!! Form::select('workout_plan',$workoutPlans, $workoutPlanId, ['class' => 'form-control select2-global', 'id'=>'select2-workout-plan']) !!}
    </div>
    <div class="col">
        <button type="button" class="btn btn-primary" wire:click="attachWorkoutPlan">{{__('common.add')}}</button>
    </div>
    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            window.initSelectWorkoutPlan=()=>{
                $('#select2-workout-plan').select2();
            }
            $('#select2-workout-plan').on('change', function (e) {
                Livewire.emit('selectedWorkoutPlan', e.target.value)
            });
            window.livewire.on('select2',()=>{
                initSelectWorkoutPlan();
            });
        });
    </script>
</div>
