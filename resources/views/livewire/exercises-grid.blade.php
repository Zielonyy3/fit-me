<div class="exercises-grid">
    <div class="row">
        <h class="card-title">{{__('common.exercises')}}</h>
    </div>
    <div class="row">
        <div class="col-12">
            <input class="form-control" type="text" placeholder="{{__('common.search')}}"
                   wire:model="search">
        </div>
    </div>
    <div class="row draggable-cards-container">
        <div wire:loading.delay.shorter>
            <x-ui.spinning-loader />
        </div>
        @foreach($exercises as $exercise)
            <x-exercise-card :exercise="$exercise" :width="9"/>
        @endforeach
        @include('components.ui.pagination')
    </div>
</div>
