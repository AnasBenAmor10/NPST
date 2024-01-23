<?php

namespace App\Http\Livewire\Admin\Stage_encadrant;

use App\Models\Stage_encadrant;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class Read extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $queryString = ['search'];

    protected $listeners = ['stage_encadrantDeleted'];

    public $sortType;
    public $sortColumn;

    public function stage_encadrantDeleted(){
        // Nothing ..
    }

    public function sort($column)
    {
        $sort = $this->sortType == 'desc' ? 'asc' : 'desc';

        $this->sortColumn = $column;
        $this->sortType = $sort;
    }

    public function render()
    {
        $data = Stage_encadrant::query();

        $instance = getCrudConfig('stage_encadrant');
        if($instance->searchable()){
            $array = (array) $instance->searchable();
            $data->where(function (Builder $query) use ($array){
                foreach ($array as $item) {
                    if(!\Str::contains($item, '.')) {
                        $query->orWhere($item, 'like', '%' . $this->search . '%');
                    } else {
                        $array = explode('.', $item);
                        $query->orWhereHas($array[0], function (Builder $query) use ($array) {
                            $query->where($array[1], 'like', '%' . $this->search . '%');
                        });
                    }
                }
            });
        }

        if($this->sortColumn) {
            $data->orderBy($this->sortColumn, $this->sortType);
        } else {
            $data->latest('id');
        }

        $data = $data->paginate(config('easy_panel.pagination_count', 15));

        return view('livewire.admin.stage_encadrant.read', [
            'stage_encadrants' => $data
        ])->layout('admin::layouts.app', ['title' => __(\Str::plural('Stage_encadrant')) ]);
    }
}
