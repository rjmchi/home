<div>
    <form wire:submit='save'>
        <div class="flex gap-2 w-3/4">
            <flux:input wire:model='title' placeholder='Title...' />
            <flux:textarea wire:model='note' placeholder='Note...' />
            <flux:button variant="primary" type="submit">Add Note</flux:button>
        </div>
    </form>
    @foreach ($notes as $note)
        <div class="border-b border-teal-200 p-2 hover:bg-teal-50" wire:key='{{ $note->id }}'>
            <div class="flex justify-between">
                <div class="ml-10">
                    <h2 class="text-xl font-medium">{{ $note->title }}</h2>
                    <p>{!! nl2br(e($note->note)) !!}</p>
                </div>
                <flux:button icon="trash" variant="danger" size="sm" wire:click='delete({{ $note->id }})'
                    class="mr-10" />
            </div>
        </div>
    @endforeach
</div>
