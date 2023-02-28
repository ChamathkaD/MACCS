<?php

namespace App\Http\Livewire\Modal\Height;

use App\Height;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Create extends Component
{
    public $child_id;

    protected $listeners = ['refreshCreateHeightParent' => '$refresh'];

    public function delete($id)
    {
        Height::find($id)->delete();
        $this->emit('refreshCreateHeightParent');
    }

    public function render()
    {
        return view('livewire.modal.height.create', [
            'child_id' => $this->child_id,
            'records' => DB::table('heights')
                ->where('child_id', $this->child_id)
                ->orderBy('updated_at', 'asc')
                ->get()
        ]);
    }
}
