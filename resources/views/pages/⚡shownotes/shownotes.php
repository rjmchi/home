<?php

use App\Models\Note;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

new #[Layout('layouts::guest')]  class extends Component
{
    #[Validate('required | string')]
    public $title;
    #[Validate('required | string')]
    public $note;

    public function with() {
        return ['notes'=>Note::latest()->get()];
    }

    public function save() {
        $data = $this->validate();
        Note::create($data);
        $this->reset();
    }

    public function delete(Note $note){
        $note->delete();
    }
};