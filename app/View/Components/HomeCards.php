<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HomeCards extends Component
{
    protected $title;
    protected $index;
    protected $list;
    /**
     * Create a new component instance.
     */
    public function __construct($title,$index,$list)
    {
        $this->title = $title;
        $this->index = $index;
        $this->list = $list;
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $title = $this->title;
        $index = $this->index;
        $list = $this->list;
        return view('components.home-cards', compact('title','index','list'));
    }
}
