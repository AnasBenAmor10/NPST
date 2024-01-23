<?php

namespace App\Http\Livewire\Admin\Stage;

use App\Models\Stage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $stage;

    
    protected $rules = [
        
    ];

    public function mount(Stage $Stage){
        $this->stage = $Stage;
        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Stage') ]) ]);
        
        $this->stage->update([
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.stage.update', [
            'stage' => $this->stage
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Stage') ])]);
    }
}
