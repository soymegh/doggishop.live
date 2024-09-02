<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableCards extends Component
{
    /**
     * Create a new component instance.
     */

     protected $route;
     protected $folder;
     protected $title;
     protected $list;

    public function __construct($folder, $list, $route, $title)
    {
        $this->folder= $folder;
        $this->list= $list;
        $this->title= $title;
        $this->route= $route;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $route = $this->route;
        $list = $this->list;
        $folder = $this->folder;
        $title = $this->title;
        return view('components.table-cards', compact('route','list','folder','title'));
    }
}
