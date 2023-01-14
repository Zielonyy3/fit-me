<x-ui.card-container :title="$title">
    <div class="exercises-grid">
        <div class="row mb-4">
            <div class="col-12">
                <input class="form-control" type="text" placeholder="{{__('common.search')}}"
                       wire:model="search">
            </div>
        </div>
        <div class="row row-cards draggable-cards-container ">
            <div wire:loading.delay.shorter>
                <x-ui.spinning-loader/>
            </div>
            @foreach($records as $record)
                {!! $classInstance->renderCard($record, $cardParams) !!}
                {{--            <x-exercise-card :exercise="$record" :width="9"/>--}}
            @endforeach
            @include('components.ui.pagination')
        </div>
    </div>
</x-ui.card-container>
