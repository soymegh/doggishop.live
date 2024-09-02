<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TitleAdmin extends Component
{
    /**
     * Create a new component instance.
     */
    protected $title;
    protected $route;

    public function __construct($route, $title)
    {
        $this->title= $title;
        $this->route= $route;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        
        $route = $this->route;
        $title = $this->title;
        return view('components.title-admin', compact('route','title'));
    }
}
