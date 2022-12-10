<div>
    <section class="text-gray-600 body-font bg-white w-screen">
        <div class="container px-5 py-24 mx-auto flex flex-wrap">
            <ul>
                @forelse($history as $h)
                <li class="flex relative pb-12">
                    <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                        <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                    </div>
                    <div class="flex-shrink-0 w-10 h-10  relative z-10">
                        @if($currentPackage != $h->id)
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-green-500 inline-flex items-center justify-center text-white relative z-10">
                            <svg class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z"></path>
                            </svg>
                        </div>
                        @endif
                    </div>
                    <div class="flex flex-col">
                        @if($currentPackage != $h->id)
                        <div class="flex-shrink-0 flex leading-none ml-2 mr-2 mb-2">
                            <h2 class="text-gray-500 border-b-2 border-gray-200">Paquete: {{sprintf("%09d", $h->id)}}</h2>
                        </div>
                        @endif
                        @php $currentPackage = $h->id @endphp
                        <div class="flex flex-wrap">
                            @if($h->detections->isNotEmpty())
                            <div class="py-8 px-4 w-64">
                                <div class="h-full flex items-start">
                                    <div class="flex-grow pl-4 pr-4 pt-4  border-2 rounded-lg  border-gray-200 border-opacity-50 bg-indigo-100">
                                        <h1 class="title-font text-xl font-medium text-gray-900 mb-3">Detección en {{$h->detections->sensor->tipo}} ID: {{$h->detections->id}} @if($h->detections->intrusismo == 1) <b>Intrusismo</b> @endif</h1>
                                        <p class="leading-relaxed mb-5">Modo de detección: {{ucfirst($h->detections->modo_deteccion)}} @if($h->detections->restaurado == 1) <b>Restaurada</b> @endif</p>
                                        <p class="leading-relaxed mb-5"> Fecha: {{$h->detections->fecha->format('d/m/Y H:i:s')}}</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if($h->e_id)
                            <div class="py-8 px-4 w-64">
                                <div class="h-full flex items-start">
                                    <div class="flex-grow pl-4 pr-4  pt-4 border-2 rounded-lg  border-gray-200 border-opacity-50 bg-blue-100">
                                        <h1 class="title-font text-xl font-medium text-gray-900 mb-3">{{ucfirst($h->e_tipo)}} {{$h->e_modo}} ID: {{$h->e_id}}</h1>
                                        <p class="leading-relaxed mb-5"> Fecha: {{$h->e_fecha->format('d/m/Y H:i:s')}}</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if($h->n_id)
                            <div class="py-8 px-4 w-64">
                                <div class="h-full flex items-start">
                                    <div class="flex-grow pl-4 pr-4  pt-4 border-2 rounded-lg  border-gray-200 border-opacity-50 bg-green-100">
                                        <h1 class="title-font text-xl font-medium text-gray-900 mb-3">Aviso {{ucfirst($h->n_tipo)}} ID: {{$h->n_id}}</h1>
                                        <p class="leading-relaxed mb-5">Fecha: {{$h->n_fecha->format('d/m/Y H:i:s')}}</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </li>
                @empty
                    <p>Sin datos</p>
                @endforelse
            </ul>
        </div>
    </section>
</div>
