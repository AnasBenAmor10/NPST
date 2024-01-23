<?php

namespace App\Http\Livewire\Admin\Stage_encadrant;

use App\Models\Stage_encadrant;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $stage_encadrant;

    
    protected $rules = [
        
    ];

    public function mount(Stage_encadrant $Stage_encadrant){
        $this->stage_encadrant = $Stage_encadrant;
        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Stage_encadrant') ]) ]);
        
        $this->stage_encadrant->update([
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.stage_encadrant.update', [
            'stage_encadrant' => $this->stage_encadrant
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Stage_encadrant') ])]);
    }
}
