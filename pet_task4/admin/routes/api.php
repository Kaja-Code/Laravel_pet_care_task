<?php

use Illuminate\Support\Facades\Route;
use App\Models\Slider;

Route::get('/sliders', function () {
    return Slider::latest()->get()->map(function ($slider) {
        return [
            'id' => $slider->id,
            'title' => $slider->title,
            'subtitle' => $slider->subtitle,
            'image_url' => asset('storage/' . $slider->image),
        ];
    });
});
