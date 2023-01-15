@php($uniqId = 'wplan'.$workoutPlan->id)
<div class="card card-sm">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-auto">
                        <span class="bg-primary text-white avatar">
                            <i class="ti ti-currency-dollar"></i>
                        </span>
            </div>
            <div class="col">
                <div class="font-weight-medium">
                    <a href="{{route('workout-plans.edit', $workoutPlan)}}" class="text-decoration-none">
                        <span class="badge badge-outline text-blue">{{$workoutPlan->name}}</span>
                    </a>

                </div>
{{--                <div class="text-muted">--}}
{{--                    {{$plannedRoutine->getDuration()}}--}}
{{--                    --}}{{--                    4 weeks (1 - 28 dzień)--}}
{{--                </div>--}}
            </div>
            <div class="col">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#{{$uniqId}}" aria-expanded="false"></button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div id="{{$uniqId}}" class="accordion-collapse collapse"
                     data-bs-parent="#accordion-example"
                     style="">
{{--                    <div class="col text-muted">--}}
{{--                        {{$plannedRoutine->notes}}--}}
{{--                    </div>--}}
                    <div class="col d-flex justify-content-end">
                        <button wire:click="detachWorkoutPlan" class="btn btn-sm btn-danger" type="button">
                            <i class="ti ti-trash mr-0"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
