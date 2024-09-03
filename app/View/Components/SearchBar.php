<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SearchBar extends Component
{
    /**
     * Create a new component instance.
     */
    protected $route;
    
    public function __construct($route)
    {
        $this->route= $route;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $route = $this->route;
        return view('components.search-bar', compact('route'));
    }
}
