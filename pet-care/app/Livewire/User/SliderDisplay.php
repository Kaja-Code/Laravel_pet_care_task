<?php
namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Slider;

class SliderDisplay extends Component
{
    

    public function render()
    {
       return view('livewire.user.slider-display', [
            'sliders' => Slider::latest()->get(),
        ]);
    }
}
