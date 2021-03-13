<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormSection extends Component
{
    public $title;
    public $description;
    public $submit;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = null, $description = null, $submit = null)
    {
        $this->title = $title;
        $this->submit = $submit;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.form-section');
    }
}
