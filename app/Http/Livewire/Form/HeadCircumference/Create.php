<?php

namespace App\Http\Livewire\Form\HeadCircumference;

use App\HeadMeasurement;
use Livewire\Component;

class Create extends Component
{
    public $head_circumference;
    public $child_id;

    protected $rules = [
        'head_circumference' => ['required', 'numeric', 'between:0.0,50.0']
    ];

    public function save()
    {
        $this->validate();

        $data = [
            'child_id' => $this->child_id,
            'head_circumference_measurements' => $this->head_circumference
        ];

        HeadMeasurement::create($data);
        $this->dispatchBrowserEvent('closeCreateHeadCircumferenceModal');
        $this->clear();
        $this->emit('refreshCreateHeadCircumferenceParent');
    }

    public function clear()
    {
        $this->head_circumference = null;
    }


    public function render()
    {
        return view('livewire.form.head-circumference.create');
    }
}
