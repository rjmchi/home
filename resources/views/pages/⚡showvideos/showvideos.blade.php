<div>
    <p>Sorting By: {{ $sort_by }}</p>
    <div class=" flex  justify-between mb-4 items-center">

        <flux:heading :accent=true size='xl'>Videos</flux:heading>

        <div class="flex items-center gap-2">
            <flux:button variant="primary" color="indigo" wire:click="sortBy('category')">Sort By Category</flux:button>
            <flux:button variant="primary" color="teal" wire:click="sortBy('name')">Sort By Name</flux:button>
            <flux:button variant="primary" color="amber" wire:click="sortBy('sort_order')">Sort By Sort Order
            </flux:button>
            <flux:button variant="primary" icon="arrow-path" wire:click='reorder'>Reorder</flux:button>
        </div>
    </div>

    <form wire:submit="addVideo" class="mb-2">
        <div class="flex gap-2 mb-2">
            <flux:input wire:model='name' placeholder="Name..." class="flex-3" />
            <flux:input wire:model='category' placeholder="Category..."class="flex-2" />
            <flux:input wire:model='url' placeholder="URL..." class="flex-3" />
            <flux:input wire:model='notes' placeholder="Notes..." class="flex-2" />
            <flux:input wire:model='sort_order' placeholder="Sort Order" class="flex-1" />
        </div>

        <flux:button type="submit" variant="primary">Save</flux:button>

    </form>

    @foreach ($videos as $video)
        <div wire:key="{{ $video->id }}"
            class="hover:bg-teal-100 even:bg-indigo-50 odd:bg-teal-50 p-3 border rounded shadow">
            <div class="flex justify-between">
                <p class="">Category: {{ $video->category }}</p>
                <p class="text-lg font-medium"> {{ $video->name }}</p>
                <p class="">
                    <flux:button variant="primary" size="sm" icon='pencil-square'
                        wire:click='edit({{ $video->id }})' />
                    <flux:button wire:click='delete({{ $video->id }})' variant="danger" size="sm"
                        icon='trash' />
                </p>
            </div>
            <p class=""><a href="{{ $video->url }}">{{ $video->url }}</a></p>
            <p class="">Notes: {{ $video->notes }}</p>
            <p class="">Sort Order: {{ $video->sort_order }}</p>
        </div>
    @endforeach

</div>
