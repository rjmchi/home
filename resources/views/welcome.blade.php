<x-layouts::guest>

    <div class="md:w-2/3 mx-auto">
        <livewire:reminders />
    </div>

    {{-- <div class="grid md:grid-cols-2 gap-3">
        <livewire:add-link />
        <livewire:reminders />
    </div> --}}

    @if ($sort)
        <livewire:show-links sort={{ $sort }} />
    @else
        <livewire:show-links />
    @endif

</x-layouts::guest>
