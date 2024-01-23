<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header p-0">
                <h3 class="card-title">{{ __('ListTitle', ['name' => __(\Illuminate\Support\Str::plural('Stage')) ]) }}</h3>

                <div class="px-2 mt-4">

                    <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                        <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active">{{ __(\Illuminate\Support\Str::plural('Stage')) }}</li>
                    </ul>

                    <div class="row justify-content-between mt-4 mb-4">
                        @if(getCrudConfig('Stage')->create && hasPermission(getRouteName().'.stage.create', 0, 0))
                        <div class="col-md-4 right-0">
                            <a href="@route(getRouteName().'.stage.create')" class="btn btn-success">{{ __('CreateTitle', ['name' => __('Stage') ]) }}</a>
                        </div>
                        @endif
                        @if(getCrudConfig('Stage')->searchable())
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" class="form-control" @if(config('easy_panel.lazy_mode')) wire:model.lazy="search" @else wire:model="search" @endif placeholder="{{ __('Search') }}" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-default">
                                        <a wire:target="search" wire:loading.remove><i class="fa fa-search"></i></a>
                                        <a wire:loading wire:target="search"><i class="fas fa-spinner fa-spin" ></i></a>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col" style='cursor: pointer' wire:click="sort('type')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'type') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'type') fa-sort-amount-up ml-2 @endif'></i> {{ __('Type') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('end_of_internship_certificate')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'end_of_internship_certificate') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'end_of_internship_certificate') fa-sort-amount-up ml-2 @endif'></i> {{ __('End_of_internship_certificate') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('rapport')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'rapport') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'rapport') fa-sort-amount-up ml-2 @endif'></i> {{ __('Rapport') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('journal')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'journal') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'journal') fa-sort-amount-up ml-2 @endif'></i> {{ __('Journal') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('affected')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'affected') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'affected') fa-sort-amount-up ml-2 @endif'></i> {{ __('Affected') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('letter')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'letter') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'letter') fa-sort-amount-up ml-2 @endif'></i> {{ __('Letter') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('dateD_stage')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'dateD_stage') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'dateD_stage') fa-sort-amount-up ml-2 @endif'></i> {{ __('DateD_stage') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('dateF_stage')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'dateF_stage') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'dateF_stage') fa-sort-amount-up ml-2 @endif'></i> {{ __('DateF_stage') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('dateS')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'dateS') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'dateS') fa-sort-amount-up ml-2 @endif'></i> {{ __('DateS') }} </th>
                            
                            @if(getCrudConfig('Stage')->delete or getCrudConfig('Stage')->update)
                                <th scope="col">{{ __('Action') }}</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stages as $stage)
                            @livewire('admin.stage.single', [$stage], key($stage->id))
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="m-auto pt-3 pr-3">
                {{ $stages->appends(request()->query())->links() }}
            </div>

            <div wire:loading wire:target="nextPage,gotoPage,previousPage" class="loader-page"></div>

        </div>
    </div>
</div>
