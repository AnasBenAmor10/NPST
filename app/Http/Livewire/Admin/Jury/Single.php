<?php

namespace App\Http\Livewire\Admin\Jury;

use App\Models\Jury;
use Livewire\Component;

class Single extends Component
{

    public $jury;

    public function mount(Jury $Jury){
        $this->jury = $Jury;
    }

    public function delete()
    {
        $this->jury->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Jury') ]) ]);
        $this->emit('juryDeleted');
    }

    public function render()
    {
        return view('livewire.admin.jury.single')
            ->layout('admin::layouts.app');
    }
}
