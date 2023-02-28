<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SubmitButton extends Component
{
    public $btnText;
    public $cancelBtnRoute;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($btnText, $cancelBtnRoute)
    {
        $this->btnText = $btnText;
        $this->cancelBtnRoute = $cancelBtnRoute;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.submit-button');
    }
}
