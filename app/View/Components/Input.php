<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public string $type;
    public string $label;
    public string $placeholder;
    public string $field;
    public string $value;
    public bool $disabled;


    public function __construct(string $label, string $type = "text", string $placeholder, string $field, string $value = "", bool $disabled = false)
    {
        $this->disabled = $disabled;
        $this->type = $type;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->field = $field;
        $this->value = $value;


    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.Input');
    }
}
