<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
// use Illuminate\Support\Facades\Auth;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        // $user = Auth::user();
        return view('layouts.app');
    }
}
