<?php

namespace App\Http\Livewire\Admin\Company;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $company;

    
    protected $rules = [
        
    ];

    public function mount(Company $Company){
        $this->company = $Company;
        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Company') ]) ]);
        
        $this->company->update([
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.company.update', [
            'company' => $this->company
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Company') ])]);
    }
}
