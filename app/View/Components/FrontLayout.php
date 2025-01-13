<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use PSpell\Config;

class FrontLayout extends Component
{
    public $title ;

    public function __construct($title = null)
    {
      return $this->$title = $title ?? Config('app.name');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.front');
    }
}
