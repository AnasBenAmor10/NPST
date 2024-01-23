<?php

namespace App\Http\Livewire\Admin\Company;

use App\Models\Company;
use Livewire\Component;

class Single extends Component
{

    public $company;

    public function mount(Company $Company){
        $this->company = $Company;
    }

    public function delete()
    {
        $this->company->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Company') ]) ]);
        $this->emit('companyDeleted');
    }

    public function render()
    {
        return view('livewire.admin.company.single')
            ->layout('admin::layouts.app');
    }
}
