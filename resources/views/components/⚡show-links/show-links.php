<?php

use App\Models\Link;
use Livewire\Component;

new class extends Component
{
    public string $sort="";

    public function mount(string $sort=""){
        $this->sort = $sort;
    }

    public function with() {
        if ($this->sort){
            $query = Link::orderByName();
        }else{
            $query = Link::orderBy('sort_order');
        }
        return ['links'=> $query->get()];
    }

    public function addLink() {
        $this->dispatch('add-link');
    }
};