<?php

namespace App\Http\Livewire\Admin\Jury;

use App\Models\Jury;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $jury;

    
    protected $rules = [
        
    ];

    public function mount(Jury $Jury){
        $this->jury = $Jury;
        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Jury') ]) ]);
        
        $this->jury->update([
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.jury.update', [
            'jury' => $this->jury
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Jury') ])]);
    }
}
