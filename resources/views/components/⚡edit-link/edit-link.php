<?php

use App\Models\Link;
use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

new class extends Component
{
    use WithFileUploads;
    public Link $currentLink;
    public $currentImage;
    #[Validate('string|required')]
    public string $name;
    #[Validate('string|required')]
    public string $url;
    public $image;
    #[Validate('integer')]
    public $sort_order;
    public Link $link;

    #[On('edit-link')]
    public function editLink(Link $link){
        $this->name = $link->name;
        $this->url = $link->url;
        $this->image = $link->image;
        $this->sort_order = $link->sort_order;
        $this->currentLink = $link;
        $this->currentImage = $link->image;
        Flux::modal('edit-link')->show();
    }

    public function save() {

        $data = $this->validate();
        if ($this->image){
            if ($this->image != $this->currentImage){
                $originalName = $this->image->getClientOriginalName();
                $path = $this->image->storeAs('images', $originalName, 'public');
                $data['image'] = $path;
                }
        }
        $this->currentLink->update($data);
        Flux::modal('edit-link')->close();
        $this->reset();
        $this->redirect(route('edit.links'), true);
    }
};