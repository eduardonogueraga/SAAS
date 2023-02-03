<div class="my-2 flex sm:flex-row flex-col">
    <div class="flex flex-row mb-1 sm:mb-0">
        @if(isset($tipo))
        <div class="relative">
            <select wire:model="filtroApplogsTipo" id="filtroApplogsTipo"
                    class="appearance-none h-full rounded-l border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">

                @foreach(trans('data.applogs.filters.tipo') as $value => $text)
                    <option value="{{ $value }}"  {{ request('filtroApplogsTipo') === $value ? 'selected' : ''}} >{{ $text }}</option>
                @endforeach
            </select>
        </div>
        @endif
            @if(isset($dateBlock) == 0)
                <div class="relative">
                    <input type="text" wire:model="dateFrom"  placeholder="{{trans('data.app.filters.datepickerFrom')}}" name="dateFrom" id="dateFrom"
                           class="appearance-none h-full rounded-r border-t sm:rounded-r-none sm:border-r-0 border-r border-b block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500">
                    <div class="absolute top-0 right-0 px-3 py-2">
                        <svg class="h-6 w-6 text-gray-400"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                </div>
                <div class="relative">
                    <input type="text" wire:model="dateTo"  placeholder="{{trans('data.app.filters.datepickerTo')}}" name="dateTo" id="dateTo"
                           class="appearance-none h-full rounded-r border-t sm:rounded-r-none sm:border-r-0 border-r border-b block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500">
                    <div class="absolute top-0 right-0 px-3 py-2">
                        <svg class="h-6 w-6 text-gray-400"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                </div>
            @endif
        <div class="relative">
            <select wire:model="filtroApplogsError" id="filtroApplogsError"
                @if(isset($tipo))
                    class="appearance-none h-full rounded-r border-t sm:rounded-r-none sm:border-r-0 border-r border-b block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500">
                @else
                    class="appearance-none h-full rounded-l border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                @endif

                @foreach(trans('data.applogs.filters.err') as $value => $text)
                    <option value="{{ $value }}"  {{ request('filtroApplogsError') === $value ? 'selected' : ''}} >{{ $text }}</option>
                @endforeach
            </select>
        </div>
        @if(isset($search))
            <div class="block relative">
                <span class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
                    <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                        <path
                            d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                        </path>
                    </svg>
                </span>
                <input name="search" wire:model.debounce.150ms="search" value="{{ request('search') }}" placeholder="Buscar" class="appearance-none h-full rounded-r border-t sm:rounded-r-none sm:border-r-0 border-l border-b block pl-8 pr-6 py-2 appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500" />
            </div>
        @endif
        <div class="relative">
            <button wire:click="clearFilters({{json_encode(['filtroApplogsTipo','filtroApplogsError','dateFrom','dateTo'])}})"
                    class="appearance-none rounded-r rounded-l sm:rounded-l-none  border-gray-400  block pl-8 pr-6 py-2 text-slate-800 hover:text-blue-600 text-sm bg-white  hover:bg-slate-100 border   rounded-r-lg font-medium px-4 py-2 inline-flex space-x-1 items-center">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                    </span>
                <span>Borrar filtros</span>
            </button>
        </div>
    </div>
</div>
