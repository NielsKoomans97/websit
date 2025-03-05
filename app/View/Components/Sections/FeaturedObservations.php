<?php

namespace App\View\Components\Sections;

use App\Models\Observation;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FeaturedObservations extends Component
{
    public array $featuredObservations;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->featuredObservations = array_slice(Observation::orderByDesc('created_at')->get()->toArray(), 0, 3);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sections.featured-observations');
    }
}
