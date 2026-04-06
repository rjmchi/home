<?php

use App\Models\Video;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

new #[Layout('layouts::guest')]  class extends Component
{
    #[Validate('required|string')]
    public string $category;

    #[Validate('required|string')]
    public string $name;

    #[Validate('required|string')]
    public string $url;

    #[Validate('nullable|string')]
    public string $notes;

    #[Validate('nullable|integer')]
    public string $sort_order;

    public $editting = false;
    public $currentVideo;

    public $sort_by='sort_order';

    public function with() {
        if ($this->sort_by =='sort_order'){
            return ['videos'=>Video::orderBy('sort_order')->get()];
        } else {
            $orderBy = 'LOWER('. $this->sort_by.')';
            return ['videos'=>Video::orderByRaw($orderBy)->get()];
        }
    }

    public function sortBy($srt) {
        $this->sort_by=$srt;
    }

    public function addVideo() {
        $data = $this->validate();

        if ($this->editting){
            $this->currentVideo->name = $this->name;
            $this->currentVideo->url = $this->url;
            $this->currentVideo->category = $this->category;
            $this->currentVideo->sort_order = $this->sort_order;
            $this->currentVideo->notes = $this->notes;
            $this->currentVideo->save();
        } else {
            Video::create($data);
        }
        $this->reset();
    }

    public function edit(Video $video){
        $this->name = $video->name;
        $this->category = $video->category;
        $this->url = $video->url;
        $this->notes = $video->notes;
        $this->sort_order = $video->sort_order;
        $this->editting = true;
        $this->currentVideo = $video;
    }

    public function delete(Video $video){
        $video->delete();
    }

    public function reorder() {
        $sort_order = 10;
        $videos = Video::orderBy('sort_order')->get();

        foreach($videos as $video){
            $video->sort_order = $sort_order;
            $video->save();
            $sort_order = $sort_order + 10;
        }
        $this->redirect(route('videos'), true);
    }
};