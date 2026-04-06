<div>
    <div class=" flex  justify-between mb-4 items-center">

        <flux:heading :accent=true size='xl'>Edit Links</flux:heading>

        <flux:button variant="primary" icon="arrow-path" wire:click='reorder'>Reorder</flux:button>
    </div>

    <table class="table-auto w-full shadow-md rounded-md mt-5">
        <thead>
            <tr class="bg-indigo-50">
                <th>Name</th>
                <th>URL</th>
                <th>Image</th>
                <th>Sort Order</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($links as $link)
                <tr class="hover:bg-teal-50">
                    <td>{{ $link->name }}</td>
                    <td>{{ $link->url }}</td>
                    <td>{{ $link->image }}</td>
                    <td>{{ $link->sort_order }}</td>
                    <td>
                        <flux:button wire:click="edit({{ $link }})" icon="pencil" variant="primary"
                            size="xs" />
                        <flux:button icon="trash" variant="danger" size="xs"
                            wire:click='delete({{ $link }})' />
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

    <livewire:edit-link />

</div>
