<?php

namespace App\Http\Livewire\Admin\Supervisor;

use App\Models\Supervisor;
use Livewire\Component;

class Single extends Component
{

    public $supervisor;

    public function mount(Supervisor $Supervisor){
        $this->supervisor = $Supervisor;
    }

    public function delete()
    {
        $this->supervisor->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Supervisor') ]) ]);
        $this->emit('supervisorDeleted');
    }

    public function render()
    {
        return view('livewire.admin.supervisor.single')
            ->layout('admin::layouts.app');
    }
}
