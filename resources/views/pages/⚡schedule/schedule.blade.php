<div>
    <form wire:submit='addReminder'>
        <div class="flex gap-2">
            <flux:input class="flex-6" wire:model='message' placeholder='Message...' />
            <flux:input class="flex-1" wire:model='days' placeholder='30' />
            <flux:input class="flex-2" wire:model='due_date' placeholder='Next Due Date' />
            <flux:button type="submit" variant="primary" icon="save">Save</flux:button>
        </div>

    </form>

    <flux:table>
        <flux:table.columns>
            <flux:table.column> </flux:table.column>
            <flux:table.column>Name</flux:table.column>
            <flux:table.column>Number of Days</flux:table.column>
            <flux:table.column>Next Due Date</flux:table.column>
            <flux:table.column>Edit/Delete</flux:table.column>
        </flux:table.columns>

        <flux:table.rows>
            @foreach ($reminders as $reminder)
                <flux:table.row :key="$reminder->id" class="hover:bg-teal-100 even:bg-zinc-50 odd:bg-teal-50">
                    <flux:table.cell> </flux:table.cell>
                    <flux:table.cell class="w-1/2">{{ $reminder->message }}
                    </flux:table.cell>

                    <flux:table.cell class="whitespace-nowrap">{{ $reminder->days }}</flux:table.cell>

                    <flux:table.cell class="whitespace-nowrap">
                        {{ \Carbon\Carbon::parse($reminder->due_date)->format('m/d/y') }}
                    </flux:table.cell>
                    <flux:table.cell class="whitespace-nowrap space-x-3">
                        <flux:button icon="pencil-square" size="xs" variant="primary"
                            wire:click='edit({{ $reminder->id }})' />
                        <flux:button icon="trash" size="xs" variant="danger"
                            wire:click='delete({{ $reminder->id }})' />
                    </flux:table.cell>

                </flux:table.row>
            @endforeach
        </flux:table.rows>
    </flux:table>


</div>
