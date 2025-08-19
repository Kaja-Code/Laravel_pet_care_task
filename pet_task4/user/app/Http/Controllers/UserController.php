<?php
namespace App\Http\Controllers;

use App\Models\Slider;

class UserController extends Controller
{
    public function showSliders()
    {
        $sliders = Slider::all();  // fetch sliders from DB
        return view('master', compact('sliders'));  // pass to view
    }
}
