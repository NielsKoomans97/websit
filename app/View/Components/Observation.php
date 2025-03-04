<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Observation extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public \App\Models\Observation $observation
    ) {
        $this->observation = $observation;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $size = getimagesize($this->observation['image_path']);

        return view('components.observation', compact('size'));
    }
}
