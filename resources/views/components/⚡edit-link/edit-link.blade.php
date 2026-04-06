<div>
    <flux:modal name="edit-link" class="">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Edit Link</flux:heading>
            </div>
            <flux:input label="Name" placeholder="Name..." wire:model='name' />
            <flux:input label="URL" placeholder="http://www.example.com" wire:model='url' />

            <flux:input type="file" wire:model='image' />
            <flux:error name="image" />

            <flux:input label="Sort Order" placeholder="Sort order" wire:model='sort_order' />

            <div class="flex">
                <flux:spacer />
                <flux:button wire:click='save' type="submit" variant="primary">Save changes</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
