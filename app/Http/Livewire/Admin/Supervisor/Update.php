<?php

namespace App\Http\Livewire\Admin\Supervisor;

use App\Models\Supervisor;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $supervisor;

    
    protected $rules = [
        
    ];

    public function mount(Supervisor $Supervisor){
        $this->supervisor = $Supervisor;
        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Supervisor') ]) ]);
        
        $this->supervisor->update([
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.supervisor.update', [
            'supervisor' => $this->supervisor
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Supervisor') ])]);
    }
}
