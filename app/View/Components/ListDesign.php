<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ListDesign extends Component
{
    /**
     * Create a new component instance.
     */     
    protected $list;
    protected $route;
    protected $admin;
    public function __construct($list,$route,$admin)
    {
        $this->list= $list;
        $this->route= $route;
        $this->admin = $admin;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $list = $this->list;
        $route = $this->route;
        $admin = $this->admin;
        return view('components.list-design', compact('list', 'route','admin'));
    }
}
