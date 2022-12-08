<div>
    <div class="justify-between items-center h-32 border-b-2 mb-2">
        <label class="flex px-3 w-full">
            <input class="rounded-lg p-4 bg-gray-200 transition duration-200 focus:outline-none focus:ring-2 w-full"
                   name="search" wire:model.debounce.150ms="search" value="{{ request('search') }}" placeholder="Buscar" />
        </label>
    </div>
    <div class="max-h-[72rem] overflow-y-scroll">
        <ul class="mt-6">
            @if ($entries->isNotEmpty())
                @foreach ($entries as $key => $row)
                    <li wire:click="$emit('entrySelected', {{$row->id}})" class="items-center flex-auto py-5 px-2 md:px-5 transition duration-500 border-l-8 cursor-pointer {{$select==$row->id ? 'bg-blue-100  selected':'hover:bg-yellow-100'}}
                    @if ($row->tipo === 'activacion')
                            border-green-600
                    @elseif ($row->tipo === 'desactivacion')
                                border-yellow-600
                    @else
                         border-gray-100
                    @endif
                    ">
                        <div class="content">
                            <div class="flex justify-between items-center">
                                <h3 class="selected-title text-sm md:text-lg w-48 py-2 font-semibold main-color-blue-text dark:main-color-yellow-text transition duration-500">
                                     {{ucfirst($row->tipo)}} {{$row->modo}}</h3>
                                @if($row->notices->isNotEmpty())
                                <div class="text-md italic text-gray-400 text-xs md:text-base">
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="#21618c" viewBox="0 0 24 24" stroke="none">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                @endif
                            </div>
                            <div class="text-md italic text-gray-400 text-xs md:text-base">
                                @if(isset($entries[$key-1]))
                                    Inicio {{$row->fecha->format('d/m/Y')}} - Fin {{$entries[$key-1]->fecha->format('d/m/Y')}}
                                @else
                                  Inicio  {{$row->fecha->format('d/m/Y H:i:s')}}
                                @endif
                            </div>
                            <div class="text-md text-gray-400 text-right text-xs md:text-base">Importado: {{$row->created_at->format('d/m/Y')}}</div>
                        </div>
                    </li>
                @endforeach
                @include('shared._loadMoreRecords', ['collection'=>$entries, 'loadMethod'=> 'loadMore'])
            @else
                <li class="py-5  px-5 transition p-4 border-l-8 border-yellow-600">
                    <div class="flex justify-between items-center">
                        <h3 class="text-sm md:text-lg font-semibold">No hay entradas disponibles</h3>
                    </div>
                </li>
            @endif
        </ul>
    </div>
</div>
