<div class="w-full">
    <section class="text-gray-600 body-font">
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-5 mx-auto flex flex-wrap">
                <h2 class="sm:text-3xl text-2xl text-gray-900 font-medium title-font mb-2 md:w-2/5">ID Paquete</h2>
                <div class="md:w-3/5 md:pl-6">
                    <div class="justify-between items-center h-32  mb-2">
                        <label class="flex px-3 w-full">
                            <input class="rounded-lg p-4 bg-gray-200 transition duration-200 focus:outline-none focus:ring-2 w-full"
                                   name="search"  wire:model.debounce.150ms="search" value="{{ request('search') }}" placeholder="Buscar" />
                        </label>
                    </div>
                </div>
            </div>
        </section>
        <div class="container px-5 mx-auto flex flex-wrap">
            <p class="px-4 py-2 text-sm font-semibold text-gray-700">Número de registros {{($dataCount) ?? 0}}</p>

            @if($dataModal)
                @switch($modalTypeId)
                    @case(0)
                        @include('detections._detectionsModal', ['detailDetection'=>$modalContent, 'closeMethod' =>'closeDataModal'])
                        @break;
                    @case(1)
                        @include('entries._entriesModal', ['detailEntry'=>$modalContent, 'closeMethod' =>'closeDataModal'])
                        @break;
                    @case(2)

                        @include('notices._noticesModal', ['detailNotice'=>$modalContent, 'closeMethod' =>'closeDataModal'])
                        @break;
                    @default
                        @include('shared._noData')
                @endswitch
            @endif

            <ul class="px-5 py-5 rounded shadow bg-white w-full">
            @forelse($history as $h)
                @php $maxCount = max(sizeof($h->detections), sizeof($h->entries), sizeof($h->notices)) @endphp

                @for($i = 0; $i < $maxCount; $i++)
                        <li class="flex relative pb-12">
                            <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                                <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                            </div>
                            <div class="flex-shrink-0 w-10 h-10  relative z-10">
                                @if($i == 0)
                                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-green-500 inline-flex items-center justify-center text-white relative z-10">
                                        <svg class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z"></path>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="flex flex-col">
                                @if($i == 0)
                                    <div class="flex-shrink-0 flex leading-none ml-2 mr-2 mb-2">
                                        <h2 class="text-gray-500">Paquete: {{sprintf("%09d", $h->id)}} ({{$h->fecha->format('d/m/Y H:i:s')}})</h2>
                                    </div>
                                @endif

                                <div class="flex flex-wrap">
                                    @if(isset($h->detections[$i]))
                                        <div class="px-4 w-3/3">
                                            <div class="h-full flex items-start cursor-pointer hover:bg-yellow-100">
                                                <div class="flex pl-4 pr-4 pt-4  border-2 rounded-lg  border-gray-200 border-opacity-50 bg-indigo-100">
                                                    <h1 class="title-font text-xl font-medium text-gray-900 mb-3">Detección en {{$h->detections[$i]->sensor->tipo}} @if($h->detections[$i]->intrusismo == 1) <b>Intrusismo</b> @endif</h1>
                                                    <p class="leading-relaxed mb-5 ml-3"> Fecha: {{$h->detections[$i]->fecha->format('d/m/Y H:i:s')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if(isset($h->entries[$i]))
                                        <div class="px-4 w-3/3">
                                            <div wire:click.stop="openDataModalWithData('{{$h->entries[$i]}}', '1')" class="h-full flex items-start">
                                                <div class="flex pl-4 pr-4  pt-4 border-2 rounded-lg  border-gray-200 border-opacity-50 bg-blue-100 cursor-pointer hover:bg-yellow-100">
                                                    <h1 class="title-font text-xl font-medium text-gray-900 mb-3">{{ucfirst($h->entries[$i]->tipo)}} {{$h->entries[$i]->modo}} </h1>
                                                    <p class="leading-relaxed mb-5 ml-3"> Fecha: {{$h->entries[$i]->fecha->format('d/m/Y H:i:s')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if(isset($h->notices[$i]))
                                        <div class="px-4 w-3/3">
                                            <div class="h-full flex items-start">
                                                <div class="flex pl-4 pr-4  pt-4 border-2 rounded-lg  border-gray-200 border-opacity-50 bg-green-100 cursor-pointer hover:bg-yellow-100">
                                                    <h1 class="title-font text-xl font-medium text-gray-900 mb-3">Aviso {{ucfirst($h->notices[$i]->tipo)}} </h1>
                                                    <p class="leading-relaxed mb-5 ml-3">Fecha: {{$h->notices[$i]->fecha->format('d/m/Y H:i:s')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </li>
                @endfor

                @empty
                    @include('shared._noData')
                @endforelse
                @include('shared._loadMoreRecords', ['collection'=>$history, 'loadMethod'=> 'loadMorePackages'])
            </ul>
        </div>
    </section>
</div>
