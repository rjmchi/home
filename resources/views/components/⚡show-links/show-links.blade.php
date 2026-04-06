<div>
    <div class="flex gap-3 flex-wrap mt-2 items-center justify-center">
        <flux:button variant='primary' wire:click='addLink'>Add Link</flux:button>
        @foreach ($links as $link)
            @if ($link->image)
                <a href="{{ $link->url }}" class="lnk" target="_new"><img
                        src="{{ asset('storage/' . $link->image) }}" alt="{{ $link->name }}"></a>
            @else
                <a href="{{ $link->url }}" class="lnk" target="_new">{{ $link->name }}</a>
            @endif
        @endforeach
    </div>

    <livewire:add-link />
</div>
