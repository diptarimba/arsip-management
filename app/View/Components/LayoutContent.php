<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LayoutContent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public $heading = null,
        public $description = null,
        public $mainTitle = null,
        public $subTitle = null,
        public $half = 0
    )
    {
        $this->heading = $heading ?? 'Heading belum terisi';
        $this->description = $description ?? '';
        $this->mainTitle = $mainTitle ?? '';
        $this->subTitle = $subTitle ?? '';
        $this->half = $half;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layoutContent');
    }
}
