<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $stage->type }}</td>
    <td class="">{{ $stage->end_of_internship_certificate }}</td>
    <td class="">{{ $stage->rapport }}</td>
    <td class="">{{ $stage->journal }}</td>
    <td class="">{{ $stage->affected }}</td>
    <td class="">{{ $stage->letter }}</td>
    <td class="">{{ $stage->dateD_stage }}</td>
    <td class="">{{ $stage->dateF_stage }}</td>
    <td class="">{{ $stage->dateS }}</td>
    
    @if(getCrudConfig('Stage')->delete or getCrudConfig('Stage')->update)
        <td>

            @if(getCrudConfig('Stage')->update && hasPermission(getRouteName().'.stage.update', 0, 0, $stage))
                <a href="@route(getRouteName().'.stage.update', $stage->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('Stage')->delete && hasPermission(getRouteName().'.stage.delete', 0, 0, $stage))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Stage') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Stage') ]) }}</p>
                        <div class="mt-5 d-flex justify-content-between">
                            <a wire:click.prevent="delete" class="text-white btn btn-success shadow">{{ __('Yes, Delete it.') }}</a>
                            <a @click.prevent="modalIsOpen = false" class="text-white btn btn-danger shadow">{{ __('No, Cancel it.') }}</a>
                        </div>
                    </div>
                </div>
            @endif
        </td>
    @endif
</tr>
