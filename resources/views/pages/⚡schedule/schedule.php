<?php

use App\Models\Reminder;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use phpDocumentor\Reflection\Types\Integer;

new #[Layout('layouts::guest')]  class extends Component
{

    #[Validate('string|required')]
    public string $message;
    #[Validate('integer|required')]
    public int $days;
    #[Validate('date|required')]
    public $due_date;

    public $editting = false;
    public $id = 0;

    public function with() {
        $reminders = Reminder::where('days', '>', 0)->get();
        return ['reminders'=>$reminders];
    }

    public function addReminder(){
        $data = $this->validate();
        $data['due_date'] = Carbon::create($this->due_date);
        if ($this->editting){
            $reminder = Reminder::find($this->id);
            $reminder->update($data);
        } else {
            Reminder::create($data);
        }
        $this->reset();
    }

    public function delete(Reminder $reminder){
        $reminder->delete();
    }

    public function edit(Reminder $reminder){
        $this->message = $reminder->message;
        $this->days = $reminder->days;
        $this->due_date = $reminder->due_date;
        $this->editting = true;
        $this->id = $reminder->id;

    }
};
