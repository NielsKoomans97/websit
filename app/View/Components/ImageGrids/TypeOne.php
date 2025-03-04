<?php

namespace App\View\Components\ImageGrids;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TypeOne extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public array $observation
    )
    {
        $this->observation = $observation;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $imageSize = getimagesize(filename: $this->observation['image_path']);

        return view('components.image-grids.type-one', compact('imageSize'));
    }
}
