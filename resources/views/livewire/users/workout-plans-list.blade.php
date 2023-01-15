<div class="row mt-3">
    <div class="col-md-12">
        @foreach($workoutPlans as $workoutPlan)
            <livewire:workout-plans.workout-plan-small-card :user="$user" :workoutPlan="$workoutPlan" :wire:key="now()->timestamp"/>
        @endforeach
    </div>
</div>
