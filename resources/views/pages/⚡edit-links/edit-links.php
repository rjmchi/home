<?php

use App\Models\Link;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;

new #[Layout('layouts::guest')] class extends Component
{
    use WithFileUploads;

    public function with() {
        return ['links'=> Link::orderBy('sort_order')->get()];
    }

    public function reorder() {
        $sort_order = 10;
        $links = Link::orderBy('sort_order')->get();

        foreach($links as $link){
            $link->sort_order = $sort_order;
            $link->save();
            $sort_order = $sort_order + 10;
        }
        $this->redirect(route('edit.links'), true);
    }

    public function delete(Link $link){
        $link->delete();
        $this->redirect(route('edit.links'), true);
    }

    public function edit(Link $link){

        $this->dispatch('edit-link', $link);
    }
};