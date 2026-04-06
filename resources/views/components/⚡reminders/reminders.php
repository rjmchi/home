<?php

use App\Models\Reminder;
use Carbon\Carbon;
use Livewire\Attributes\Validate;
use Livewire\Component;

new class extends Component
{
    #[Validate('date| nullable')]
    public $due_date;
    #[Validate('string| required')]
    public $message;

    public function with (){

        $reminders = $reminders = Reminder::whereNotNull('due_date')->orderBy('due_date')->get();
        $notes = Reminder::whereNull('due_date')->get();
        $merged = $notes->merge($reminders);

        return ['reminders'=>$merged];
    }

    public function delete(Reminder $reminder){
        if ($reminder->days){
            $dt = new Carbon($reminder->due_date);
			if ($reminder->days % 30){
				$reminder->due_date = $dt->addDays($reminder->days);

			} else {
				$reminder->due_date = $dt->addMonth($reminder->days/30);
			}

			$reminder->save();
		} else {
			$reminder->delete();
		}
    }

    public function addReminder() {
        $data  = $this->validate();
        if ($this->due_date){
            $data['due_date']= Carbon::create($this->due_date);
        }
        Reminder::create($data);
        $this->reset();

    }

    public function getRowClass($dueDate): string
    {
        if (!$dueDate){
            return 'text-zinc-900';
        }
        $due = new Carbon($dueDate, 'America/Mexico_City');
        $today = Carbon::today('America/Mexico_City');

        if ($due->equalTo($today)) {
            return 'bg-yellow-100 text-red-600';
        }

        if ($due->lessThan($today)) {
            return 'text-red-600 bg-red-50';
        }

        return 'text-zinc-900';
    }
};