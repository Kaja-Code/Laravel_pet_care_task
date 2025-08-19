<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class SliderManager extends Component
{
    use WithFileUploads;

    public $title;
    public $subtitle;
    public $image;
    public $sliders;
    public $editMode = false;
    public $editSliderId;

    public function mount()
    {
        $this->refreshSliders();
    }

    public function render()
    {
       
        return view('livewire.admin.slider-manager')->layout('admin.layout');
    }

    public function save()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $imagePath = $this->image->store('sliders', 'public');

        Slider::create([
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'image' => $imagePath,
        ]);

        $this->resetForm();
        $this->refreshSliders();

        session()->flash('success', 'Slider added successfully.');
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);

        $this->editMode = true;
        $this->editSliderId = $slider->id;
        $this->title = $slider->title;
        $this->subtitle = $slider->subtitle;
        // Note: Image is not loaded because you can't bind file inputs to Livewire properties for existing files.
    }

    public function update()
{
    $slider = Slider::findOrFail($this->editSliderId);

    $this->validate([
        'title' => 'required|string|max:255',
        'subtitle' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    ]);

    if ($this->image) {
        if ($slider->image && Storage::disk('public')->exists($slider->image)) {
            Storage::disk('public')->delete($slider->image);
        }

        $imagePath = $this->image->store('sliders', 'public');
        $slider->image = $imagePath;
    }

    $slider->title = $this->title;
    $slider->subtitle = $this->subtitle;
    $slider->save();

    $this->resetForm();
    $this->refreshSliders();

    $this->image = null; // reset image after update

    session()->flash('success', 'Slider updated successfully.');
}

    public function delete($id)
    {
        $slider = Slider::findOrFail($id);

        if ($slider->image && Storage::disk('public')->exists($slider->image)) {
            Storage::disk('public')->delete($slider->image);
        }

        $slider->delete();
        $this->refreshSliders();

        session()->flash('success', 'Slider deleted successfully.');
    }

    public function resetForm()
    {
        $this->title = '';
        $this->subtitle = '';
        $this->image = null;
        $this->editMode = false;
        $this->editSliderId = null;
    }

    private function refreshSliders()
    {
        $this->sliders = Slider::latest()->get();
    }
}
