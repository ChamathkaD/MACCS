<?php

namespace App\Http\Livewire\Modal\HeadCircumference;

use App\HeadMeasurement;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Create extends Component
{
    public $child_id;

    protected $listeners = ['refreshCreateHeadCircumferenceParent' => '$refresh'];

    public function delete($id)
    {
        HeadMeasurement::find($id)->delete();
        $this->emit('refreshCreateHeadCircumferenceParent');
    }

    public function render()
    {
        return view('livewire.modal.head-circumference.create', [
            'child_id' => $this->child_id,
            'records' => DB::table('head_measurements')
                ->where('child_id', $this->child_id)
                ->orderBy('updated_at', 'asc')
                ->get()
        ]);
    }
}
