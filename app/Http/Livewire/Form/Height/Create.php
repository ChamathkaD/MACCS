<?php

namespace App\Http\Livewire\Form\Height;

use App\Height;
use Livewire\Component;

class Create extends Component
{
    public $height;
    public $child_id;

    protected $rules = [
        'height' => ['required', 'numeric', 'between:0.0,6.0']
    ];

    public function save()
    {
        $this->validate();

        $data = [
            'child_id' => $this->child_id,
            'height' => $this->height
        ];

        Height::create($data);
        $this->dispatchBrowserEvent('closeCreateHeightModal');
        $this->clear();
        $this->emit('refreshCreateHeightParent');
    }

    public function clear()
    {
        $this->height = null;
    }

    public function render()
    {
        return view('livewire.form.height.create');
    }
}
