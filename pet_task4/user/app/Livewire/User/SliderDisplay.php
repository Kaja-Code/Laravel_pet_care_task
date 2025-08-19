<?php
namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SliderDisplay extends Component
{
    public $sliders = [];

    public function mount()
    {
        // Fetch from API endpoint
        $response = Http::get(env('API_BASE_URL'));

        if ($response->successful()) {
            $this->sliders = $response->json();
        }
    }

    public function render()
    {
        return view('livewire.user.slider-display', [
            'sliders' => $this->sliders,
        ]);
    }
}
