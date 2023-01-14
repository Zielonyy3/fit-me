@props(['routine'])
@php($uniqId = 'rout'.$routine->pivot->start_day.''.$routine->pivot->end_day)
@php($duration = $routine->pivot->start_day. ' - '. $routine->pivot->end_day)
<div class="card card-sm">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-auto">
                        <span class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                            <i class="ti ti-currency-dollar"></i>
                        </span>
            </div>
            <div class="col">
                <div class="font-weight-medium">
                    {{$routine->pivot->name ?? $routine->name}}
                </div>
                <div class="text-muted">
                    {{$duration}}
                    {{--                    4 weeks (1 - 28 dzień)--}}
                </div>
            </div>
            @if(!empty($routine->pivot->notes))
                <div class="col">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#{{$uniqId}}" aria-expanded="false"></button>
                </div>
            @endif
        </div>
        @if(!empty($routine->pivot->notes))
            <div class="row">
                <div class="col">
                    <div id="{{$uniqId}}" class="accordion-collapse collapse" data-bs-parent="#accordion-example"
                         style="">
                        <div class="accordion-body text-muted">
                            {{$routine->pivot->notes}}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
</script>
