<?php

namespace App\View\Components\Sections;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class Navigation extends Component
{
    public array $routes;

    public function __construct()
    {
        // Get all named routes that return a view
        $this->routes = [];

        foreach (Route::getRoutes() as $route) {
            if ($route->getName() !== null && str_ends_with($route->getName(), '.index')) {
                $this->routes[] = [
                    'name' => $route->getName(),
                    'uri' => $route->uri(),
                ];
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sections.navigation');
    }
}
