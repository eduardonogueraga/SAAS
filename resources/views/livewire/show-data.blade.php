<div class="w-full">
    <div class="p-6 rounded-lg shadow-lg bg-white">
        <div class="flex flex-col">
            <div class="flex justify-between items-center  mb-2">
                <h2 class="sm:text-3xl text-2xl text-gray-900 font-medium title-font mb-2 md:w-2/5">Registro de datos</h2>
                <label class="px-3 w-full">
                    <input class="rounded-lg p-4 bg-gray-200 transition duration-200 focus:outline-none focus:ring-2 w-full"
                           name="search" wire:model.debounce.150ms="search"  value="{{ request('search') }}" placeholder="Buscar" />
                </label>
            </div>
            <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                <label wire:click="clearList"  class="flex items-start rounded-xl bg-white p-4 shadow-lg cursor-pointer hover:bg-indigo-100 @if($dataRadio == 0) bg-indigo-100 @else  bg-white @endif">
                    <input type="radio" value="0"  wire:model="dataRadio" name="data-radio" checked style="display:none" />
                    <div class="flex h-12 w-12 items-center justify-center rounded-full border border-blue-100 bg-blue-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" fill="#21618c" viewBox="0 0 20 20" stroke="none">
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
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-400" fill="#ff7e13" viewBox="0 0 20 20" stroke="none">
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
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-400" fill="#ba3613" viewBox="0 0 20 20" stroke="none" >
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
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-400" fill="#39ba13" viewBox="0 0 20 20" stroke="none">
                            <path d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z"></path>
                        </svg>
                    </div>

                    <div class="ml-4">
                        <h2 class="font-semibold">Paquetes {{$this->infoRegistros[0]->num_packages}}</h2>
                    </div>
                </label>

                <label wire:click="clearList" class="flex items-start rounded-xl bg-white p-4 shadow-lg cursor-pointer hover:bg-indigo-100 @if($dataRadio == 5) bg-indigo-100 @else  bg-white @endif">
                    <input type="radio" value="5"  wire:model="dataRadio" name="data-radio" checked style="display:none" />
                    <div class="flex h-12 w-12 items-center justify-center rounded-full border border-indigo-100 bg-indigo-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="#099F77" viewBox="0 0 20 20" stroke="none">
                            <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
                        </svg>
                    </div>

                    <div class="ml-4">
                        <h2 class="font-semibold">SAA Info</h2>
                    </div>
                </label>
                <label wire:click="clearList" class="flex items-start rounded-xl bg-white p-4 shadow-lg cursor-pointer hover:bg-indigo-100 @if($dataRadio == 6) bg-indigo-100 @else  bg-white @endif">
                    <input type="radio" value="6"  wire:model="dataRadio" name="data-radio" checked style="display:none" />
                    <div class="flex h-12 w-12 items-center justify-center rounded-full border border-orange-100 bg-orange-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                    </div>

                    <div class="ml-4">
                        <h2 class="font-semibold">SAAS Logs {{$this->infoRegistros[0]->num_applogs}}</h2>
                    </div>
                </label>
            </div>
        </div>
        <div>
            @if($dataModal)
                @php $info = $data->filter(function($item) use($selectedRegister) {return $item->id == $selectedRegister;})->first() @endphp

                @switch($dataRadio)
                    @case(0)
                        @include('entries._entriesModal', ['detailEntry'=>$info, 'closeMethod' =>'closeDataModal'])
                        @break;
                    @case(1)
                        @include('detections._detectionsModal', ['detailDetection'=>$info, 'closeMethod' =>'closeDataModal'])
                        @break;
                    @case(2)
                        @include('notices._noticesModal', ['detailNotice'=>$info, 'closeMethod' =>'closeDataModal'])
                        @break;
                    @case(3)
                        @include('logs._logsModal', ['detailLog'=>$info, 'closeMethod' =>'closeDataModal'])
                        @break;
                    @case(4)
                        @include('packages._packagesModal', ['detailPackage'=>$info, 'closeMethod' =>'closeDataModal'])
                        @break;
                    @case(6)
                        @include('applogs._applogsModal', ['detailApplog'=>$info, 'closeMethod' =>'closeDataModal'])
                        @break;
                    @default
                        @include('shared._noData')
                @endswitch
            @endif
            <p class="px-4 py-2 text-sm font-semibold text-gray-700">Número de registros {{($dataCount) ?? 0}}</p>

                @switch($dataRadio)
                    @case(0)
                        @include('entries._entriesFilters')
                    @break
                    @case(1)
                        @include('detections._detectionsFilters',['intrusismo' => 1])
                    @break
                    @case(2)
                        @include('notices._noticesFilters')
                    @break
                    @case(4)
                        @include('packages._packagesFilters')
                    @break

                @endswitch
            <ul class="w-full h-screen overflow-auto shadow bg-white mt-5">
                @forelse($data as $d)

                    @switch($dataRadio)
                        @case(0)
                            <li wire:click.stop="openDataModal('{{$d->id}}')" class="shadow-lg pt-4 ml-2 mr-2 rounded-lg ">
                                <div  class="block bg-white py-3 border-t pb-4 hover:bg-yellow-100 cursor-pointer">
                                    <div class="px-4 py-2 flex  justify-between">
                                        <div class="flex">
                                           <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="@if($d->tipo == 'activacion') #21618c @else green @endif" viewBox="0 0 24 24" stroke="none">
                                               @if($d->tipo == 'activacion')
                                                   <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                                               @else
                                                   <path d="M10 2a5 5 0 00-5 5v2a2 2 0 00-2 2v5a2 2 0 002 2h10a2 2 0 002-2v-5a2 2 0 00-2-2H7V7a3 3 0 015.905-.75 1 1 0 001.937-.5A5.002 5.002 0 0010 2z"></path>
                                               @endif
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
                            <li wire:click.stop="openDataModal('{{$d->id}}')" class="shadow-lg pt-4 ml-2 mr-2 rounded-lg">
                                <div  class="block bg-white py-3 border-t pb-4 hover:bg-yellow-100 cursor-pointer">
                                    <div class="px-4 py-2 flex  justify-between">
                                        <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-400" fill="@if($d->intrusismo) red @else #e47d09 @endif" viewBox="0 0 20 20" stroke="none" >
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="ml-3 text-sm font-semibold text-gray-900">ID: {{sprintf("%09d", $d->id)}} Detección en {{$d->sensor->literales_tipo->literal}} @if($d->intrusismo == 1) <b>Intrusismo</b> @endif  </span>
                                        </div>
                                        <div class="flex">
                                            <span class="px-4 text-sm font-semibold text-gray-600">Fecha: {{$d->fecha->format('d/m/Y H:i:s')}}</span>
                                        </div>
                                    </div>
                                    <p class="px-4 py-2 text-sm font-semibold text-gray-700">Sensor: {{$d->sensor->literales_tipo->literal}}  {{$d->sensor->estado}} ({{$d->sensor->valor_sensor}})</p>
                                </div>
                            </li>
                            @break

                        @case(2)
                            <li wire:click.stop="openDataModal('{{$d->id}}')" class="shadow-lg pt-4 ml-2 mr-2 rounded-lg">
                                <div class="block bg-white py-3 border-t pb-4 hover:bg-yellow-100 cursor-pointer">
                                    <div class="px-4 py-2 flex  justify-between">
                                        <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-400" fill="@if($d->tipo == 'sms') #21618c @else green @endif" viewBox="0 0 20 20" stroke="none">
                                            @if($d->tipo == 'sms')
                                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                            @else
                                                <path d="M17.924 2.617a.997.997 0 00-.215-.322l-.004-.004A.997.997 0 0017 2h-4a1 1 0 100 2h1.586l-3.293 3.293a1 1 0 001.414 1.414L16 5.414V7a1 1 0 102 0V3a.997.997 0 00-.076-.383z"></path>
                                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                                            @endif
                                        </svg>
                                        <span class="ml-3 text-sm font-semibold text-gray-900">ID:{{sprintf("%09d", $d->id)}} Aviso {{ucfirst($d->tipo)}}  </span>
                                        </div>
                                        <div class="flex">
                                            <span class="px-4 text-sm font-semibold text-gray-600">Fecha: {{$d->fecha->format('d/m/Y H:i:s')}}</span>
                                        </div>
                                    </div>
                                    <p class="px-4 py-2 text-sm font-semibold text-gray-700">@if($d->tipo == 'sms') {{Str::limit($d->literales_asunto->literal,60)}} @else Tlf: {{$d->telefono}} @endif</p>
                                </div>
                            </li>
                            @break

                        @case(3)
                            <li wire:click.stop="openDataModal('{{$d->id}}')" class="shadow-lg pt-4 ml-2 mr-2 rounded-lg">
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
                                    <p class="px-4 py-2 text-sm font-semibold text-gray-700">{{Str::limit($d->literales_descripcion->literal,60)}}</p>
                                </div>
                            </li>
                            @break

                        @case(4)
                            <li wire:click.stop="openDataModal('{{$d->id}}')" class="shadow-lg pt-4 ml-2 mr-2 rounded-lg">
                                <div class="block bg-white py-3 border-t pb-4 hover:bg-yellow-100 cursor-pointer">
                                    <div class="px-4 py-2 flex  justify-between">
                                        <div class="flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-400" fill="@if($d->implantado) #39ba13  @else red @endif" viewBox="0 0 20 20" stroke="none" >
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
                        @case(5)
                            <li  class="shadow-lg pt-4 ml-2 mr-2 rounded-lg">
                                <div class="block bg-white py-3 border-t pb-4 ">
                                    @include('systems._systemPanel', ['systemInfo'=>$d])
                                </div>
                            </li>
                            @break
                        @case(6)
                            <li wire:click.stop="openDataModal('{{$d->id}}')" class="shadow-lg pt-4 ml-2 mr-2 rounded-lg">
                                <div class="block bg-white py-3 border-t pb-4 hover:bg-yellow-100 cursor-pointer">
                                    <div class="px-4 py-2 flex  justify-between">
                                        <div class="flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                            </svg>
                                            <span class="ml-3 text-sm font-semibold text-gray-900">ID: {{sprintf("%09d", $d->id)}} Log de la aplicacion web</span>
                                        </div>
                                        <div class="flex">
                                            <span class="px-4 text-sm font-semibold text-gray-600">Fecha: {{$d->created_at->format('d/m/Y H:i:s')}}</span>
                                        </div>
                                    </div>
                                    <p class="px-4 py-2 text-sm font-semibold text-gray-700">{{Str::limit($d->respuesta_http,60)}}</p>
                                </div>
                            </li>
                            @break

                        @default
                            <li wire:click.stop="openDataModal('{{$d->id}}')" class="shadow-lg pt-4 ml-2 mr-2 rounded-lg">
                                <div class="block bg-white py-3 border-t pb-4 hover:bg-yellow-100 cursor-pointer">
                                    <div class="px-4 py-2 flex  justify-between">
                                        <div class="flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" fill="#39ba13" viewBox="0 0 20 20" stroke="currentColor" stroke-width="2">
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
                   @include('shared._noData')
                @endforelse
                @include('shared._loadMoreRecords', ['collection'=>$data, 'loadMethod'=> 'loadMoreData'])
            </ul>
        </div>
    </div>
</div>

