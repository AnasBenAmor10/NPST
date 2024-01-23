<?php

namespace App\Http\Livewire\Admin\Stage_encadrant;

use App\Models\Stage_encadrant;
use Livewire\Component;

class Single extends Component
{

    public $stage_encadrant;

    public function mount(Stage_encadrant $Stage_encadrant){
        $this->stage_encadrant = $Stage_encadrant;
    }

    public function delete()
    {
        $this->stage_encadrant->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Stage_encadrant') ]) ]);
        $this->emit('stage_encadrantDeleted');
    }

    public function render()
    {
        return view('livewire.admin.stage_encadrant.single')
            ->layout('admin::layouts.app');
    }
}
