<?php

namespace App\Http\Livewire\Admin\Supervisor;

use App\Models\Supervisor;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    // public $name;
    public $nombre;

    protected $rules = [
        // 'name' => 'required',
        'nombre' => 'required'
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if ($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Supervisor')])]);

        Supervisor::create([
            'user_id' => auth()->id(),
            // 'name' => $this->name,
            'nombre' => $this->nombre,
        ]);

        $this->reset();
    }

    public function render()
    {
        $supervisors = Supervisor::with('user')->get();

        return view('livewire.admin.supervisor.create', [
            'supervisors' => $supervisors,
        ])->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Supervisor')])]);
    }
}
