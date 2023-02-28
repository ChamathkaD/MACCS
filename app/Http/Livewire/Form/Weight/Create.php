<?php

namespace App\Http\Livewire\Form\Weight;

use App\Weight;
use Livewire\Component;

class Create extends Component
{
    public $weight;
    public $child_id;

    protected $rules = [
        'weight' => ['required', 'numeric', 'between:0.0,50.0']
    ];

    public function save()
    {
        $this->validate();

        $data = [
            'child_id' => $this->child_id,
            'weight' => $this->weight
        ];

        Weight::create($data);
        $this->dispatchBrowserEvent('closeCreateWeightModal');
        $this->clear();
        $this->emit('refreshCreateWeightParent');
    }

    public function clear()
    {
        $this->weight = null;
    }

    public function render()
    {
        return view('livewire.form.weight.create');
    }
}
