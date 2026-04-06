<?php

use App\Models\Link;
use Flux\Flux;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;

new class extends Component
{
    use WithFileUploads;

    #[Validate('required')]
    public string $name;

    #[Validate('required')]
    public string $url;

    #[Validate('integer')]
    public $image_width=150;

    #[Validate('nullable|integer')]
    public $image_height;

    #[Validate('nullable|integer')]
    public $sort_order=0;

    #[Validate('nullable|image')]
    public $image = null;

    #[On('add-link')]
    function addLink() {
        Flux::modal('add-link')->show();
    }

    public function  save() {
        $data = $this->Validate();

        if ($this->image){
            // $path = $this->image->store('images', 'public');
            $originalName = $this->image->getClientOriginalName();
            $path = $this->image->storeAs('images', $originalName, 'public');
            // $destination  = public_path('images');

            // Ensure the destination directory exists
            // if (!file_exists($destination)) {
            //     mkdir($destination, 0755, true);
            // }

            // Move the file to public/images, keeping the original filename
            // $path = $this->image->move($destination, $originalName);

            $data['image'] = $path;
        }
        Link::create($data);

        session()->flash('success', 'Link Created');

        $this->reset();
        $this->redirect(route('home'), true);

    }
};