<div class="flex justify-center">
    <div class="p-6 rounded-lg shadow-lg bg-white">
        <div class="flex flex-col">
            <h2 class="mb-4 text-2xl">Registro de datos</h2>

            <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                <label wire:click="clearList"  class="flex items-start rounded-xl bg-white p-4 shadow-lg cursor-pointer hover:bg-indigo-100 @if($dataRadio == 0) bg-indigo-100 @else  bg-white @endif">
                    <input type="radio" value="0"  wire:model="dataRadio" name="data-radio" checked style="display:none" />
                    <div class="flex h-12 w-12 items-center justify-center rounded-full border border-blue-100 bg-blue-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" fill="none" viewBox="0 0 20 20" stroke="currentColor" stroke-width="2">
                            <path  stroke-linecap="round" stroke-linejoin="round"  d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </div>

                    <div class="ml-4">
                        <h2 class="font-semibold">Entradas {{$this->infoRegistros[0]->num_entries}}</h2>
                    </div>
                </label>

                <label wire:click="clearList" class="flex items-start rounded-xl bg-white p-4 shadow-lg cursor-pointer hover:bg-indigo-100 @if($dataRadio == 1) bg-indigo-100 @else  bg-white @endif">
                    <input type="radio" value="1"  wire:model="dataRadio" name="data-radio" checked style="display:none" />
                    <div class="flex h-12 w-12 items-center justify-center rounded-full border border-orange-100 bg-orange-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-400" fill="none" viewBox="0 0 20 20" stroke="currentColor" stroke-width="2">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                        </svg>
                    </div>

                    <div class="ml-4">
                        <h2 class="font-semibold">Detecciones {{$this->infoRegistros[0]->num_detections}}</h2>
                    </div>
                </label>
                <label wire:click="clearList" class="flex items-start rounded-xl bg-white p-4 shadow-lg cursor-pointer hover:bg-indigo-100 @if($dataRadio == 2) bg-indigo-100 @else  bg-white @endif">
                    <input type="radio" value="2"  wire:model="dataRadio" name="data-radio" checked style="display:none" />
                    <div class="flex h-12 w-12 items-center justify-center rounded-full border border-red-100 bg-red-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-400" fill="none" viewBox="0 0 20 20" stroke="currentColor" stroke-width="2">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                        </svg>
                    </div>

                    <div class="ml-4">
                        <h2 class="font-semibold">Mensajes {{$this->infoRegistros[0]->num_notices}}</h2>
                    </div>
                </label>
                <label wire:click="clearList" class="flex items-start rounded-xl bg-white p-4 shadow-lg cursor-pointer hover:bg-indigo-100 @if($dataRadio == 3) bg-indigo-100 @else  bg-white @endif">
                    <input type="radio" value="3"  wire:model="dataRadio" name="data-radio" checked style="display:none" />
                    <div class="flex h-12 w-12 items-center justify-center rounded-full border border-indigo-100 bg-indigo-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                    </div>

                    <div class="ml-4">
                        <h2 class="font-semibold">Logs {{$this->infoRegistros[0]->num_logs}}</h2>
                    </div>
                </label>

                <label wire:click="clearList" class="flex items-start rounded-xl bg-white p-4 shadow-lg cursor-pointer hover:bg-indigo-100 @if($dataRadio == 4) bg-indigo-100 @else  bg-white @endif">
                    <input type="radio" value="4"  wire:model="dataRadio" name="data-radio" checked style="display:none" />
                    <div class="flex h-12 w-12 items-center justify-center rounded-full border border-indigo-100 bg-indigo-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 20 20" stroke="currentColor" stroke-width="2">
                            <path d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z"></path>
                        </svg>
                    </div>

                    <div class="ml-4">
                        <h2 class="font-semibold">Paquetes {{$this->infoRegistros[0]->num_packages}}</h2>
                    </div>
                </label>
            </div>
        </div>
        <div>
            @if($dataModal)
                @php $info = $data->filter(function($item) use($selectedRegister) {return $item->id == $selectedRegister;})->first() @endphp
                @include('notices._noticesModal', ['detailNotice'=>$info, 'closeMethod' =>'closeDataModal'])
            @endif

            <ul class="w-full h-screen overflow-auto shadow bg-white mt-5">
                @forelse($data as $d)

                    @switch($dataRadio)
                        @case(0)
                            <li class="shadow-lg pt-4 ml-2 mr-2 rounded-lg ">
                                <div  class="block bg-white py-3 border-t pb-4 hover:bg-yellow-100 cursor-pointer">
                                    <div class="px-4 py-2 flex  justify-between">
                                        <div class="flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" fill="none" viewBox="0 0 20 20" stroke="currentColor" stroke-width="2">
                                                <path  stroke-linecap="round" stroke-linejoin="round"  d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="ml-3 text-sm font-semibold text-gray-900">ID: {{sprintf("%09d", $d->id)}} {{ucfirst($d->tipo)}} {{$d->modo}} </span>
                                        </div>
                                         <div class="flex">
                                            <span class="px-4 text-sm font-semibold text-gray-600">Fecha: {{$d->fecha->format('d/m/Y H:i:s')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @break
                        @case(1)
                            <li class="shadow-lg pt-4 ml-2 mr-2 rounded-lg">
                                <div  class="block bg-white py-3 border-t pb-4 hover:bg-yellow-100 cursor-pointer">
                                    <div class="px-4 py-2 flex  justify-between">
                                        <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-400" fill="none" viewBox="0 0 20 20" stroke="currentColor" stroke-width="2">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="ml-3 text-sm font-semibold text-gray-900">ID: {{sprintf("%09d", $d->id)}} Detección en {{$d->sensor->tipo}} @if($d->intrusismo == 1) <b>Intrusismo</b> @endif  </span>
                                        </div>
                                        <div class="flex">
                                            <span class="px-4 text-sm font-semibold text-gray-600">Fecha: {{$d->fecha->format('d/m/Y H:i:s')}}</span>
                                        </div>
                                    </div>
                                    <p class="px-4 py-2 text-sm font-semibold text-gray-700">Sensor: {{$d->sensor->tipo}}  {{$d->sensor->estado}} ({{$d->sensor->valor_sensor}})</p>
                                </div>
                            </li>
                            @break

                        @case(2)
                            <li wire:click.stop="openDataModal('{{$d->id}}')" class="shadow-lg pt-4 ml-2 mr-2 rounded-lg">
                                <div class="block bg-white py-3 border-t pb-4 hover:bg-yellow-100 cursor-pointer">
                                    <div class="px-4 py-2 flex  justify-between">
                                        <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-400" fill="none" viewBox="0 0 20 20" stroke="currentColor" stroke-width="2">
                                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                        </svg>
                                        <span class="ml-3 text-sm font-semibold text-gray-900">ID:{{sprintf("%09d", $d->id)}} Aviso {{ucfirst($d->tipo)}}  </span>
                                        </div>
                                        <div class="flex">
                                            <span class="px-4 text-sm font-semibold text-gray-600">Fecha: {{$d->fecha->format('d/m/Y H:i:s')}}</span>
                                        </div>
                                    </div>
                                    <p class="px-4 py-2 text-sm font-semibold text-gray-700">@if($d->tipo == 'sms') {{Str::limit($d->asunto,60)}} @else Tlf: {{$d->telefono}} @endif</p>
                                </div>
                            </li>
                            @break

                        @case(3)
                            <li class="shadow-lg pt-4 ml-2 mr-2 rounded-lg">
                                <div class="block bg-white py-3 border-t pb-4 hover:bg-yellow-100 cursor-pointer">
                                    <div class="px-4 py-2 flex  justify-between">
                                        <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                        </svg>
                                        <span class="ml-3 text-sm font-semibold text-gray-900">ID: {{sprintf("%09d", $d->id)}} Log del sistema</span>
                                        </div>
                                        <div class="flex">
                                            <span class="px-4 text-sm font-semibold text-gray-600">Fecha: {{$d->fecha->format('d/m/Y H:i:s')}}</span>
                                        </div>
                                    </div>
                                    <p class="px-4 py-2 text-sm font-semibold text-gray-700">{{Str::limit($d->descripcion,60)}}</p>
                                </div>
                            </li>
                            @break

                        @case(4)
                            <li class="shadow-lg pt-4 ml-2 mr-2 rounded-lg">
                                <div class="block bg-white py-3 border-t pb-4 hover:bg-yellow-100 cursor-pointer">
                                    <div class="px-4 py-2 flex  justify-between">
                                        <div class="flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 20 20" stroke="currentColor" stroke-width="2">
                                                <path d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z"></path>
                                            </svg>
                                        <span class="ml-3 text-sm font-semibold text-gray-900">ID Paquete: {{sprintf("%09d", $d->id)}}</span>
                                        </div>
                                        <div class="flex">
                                            <span class="px-4 text-sm font-semibold text-gray-600">Fecha: {{$d->fecha->format('d/m/Y H:i:s')}}</span>
                                        </div>
                                    </div>
                                    <p class="px-4 py-2 text-sm font-semibold text-gray-700">@if($d->implantado) Paquete instalado @else Paquete KO @endif</p>
                                </div>
                            </li>
                            @break

                        @default
                            <li class="shadow-lg pt-4 ml-2 mr-2 rounded-lg">
                                <div class="block bg-white py-3 border-t pb-4 hover:bg-yellow-100 cursor-pointer">
                                    <div class="px-4 py-2 flex  justify-between">
                                        <div class="flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" fill="none" viewBox="0 0 20 20" stroke="currentColor" stroke-width="2">
                                                <path  stroke-linecap="round" stroke-linejoin="round"  d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                        <span class="ml-3 text-sm font-semibold text-gray-900"> {{ucfirst($d->tipo)}} {{$d->modo}} </span>
                                        </div>
                                        <div class="flex">
                                            <span class="px-4 text-sm font-semibold text-gray-600">Fecha: {{$d->fecha->format('d/m/Y H:i:s')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                    @endswitch

                @empty
                    @include('shared._emptyList', ['name'=> 'datos'])
                @endforelse
                @include('shared._loadMoreRecords', ['collection'=>$data, 'loadMethod'=> 'loadMoreData'])
            </ul>
        </div>
    </div>
</div>

