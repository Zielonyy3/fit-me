<div>
    @if ($currentPage == 1)
        <span class="btn btn-sm btn-secondary disabled">
            &laquo;
        </span>
    @else
        <a wire:click="changePage({{$currentPage}} - 1)" rel="prev" class="btn btn-sm btn-secondary">
            &laquo;
        </a>
    @endif

    <select name="{{$pageName}}" class="select2-global" wire:change="changePage($event.target.value)">
        @for($page = 1; $page <= ceil($total / $perPage); $page++)
            <option @selected($page == $currentPage) value="{{$page}}">{{$page}}</option>
        @endfor
    </select>

    {{-- Next Page Link --}}
    @if ($currentPage < ceil($total / $perPage))
        <a wire:click="changePage({{$currentPage}} + 1)" rel="next" class="btn btn-sm btn-secondary">
            &raquo;
        </a>
    @else
        <span class="btn btn-sm btn-secondary disabled">
            &raquo;
        </span>
    @endif
</div>
