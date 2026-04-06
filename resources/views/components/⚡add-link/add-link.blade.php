<div class=" border bg-indigo-50">

    <flux:modal name="add-link">
        <form wire:submit="save" class="p-2 space-y-2" enctype="multipart/form-data">
            <flux:input wire:model='name' placeholder="Name..." />
            <flux:error name="name" />
            <flux:input wire:model='url' placeholder="http://www.someplace.com" />
            <flux:error name="url" />

            <div class="flex gap-2">

                <flux:input wire:model='image_width' placeholder="Width" />
                <flux:input wire:model='image_height' placeholder="Height" />
                <flux:input wire:model='sort_order' placeholder="Sort Order" />
            </div>

            <flux:input type="file" wire:model='image' />
            <flux:error name="image" />

            <flux:button type="submit" variant="primary">Save</flux:button>

        </form>
    </flux:modal>
</div>
