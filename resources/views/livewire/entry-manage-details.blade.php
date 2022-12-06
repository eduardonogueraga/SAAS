@if($entry)
<div>
    <section class="text-gray-600 body-font">
        <div class="container flex flex-wrap px-5 py-24 mx-auto items-center">
            <div class="md:w-1/2 md:pr-12 md:py-8 md:border-r md:border-b-0 mb-10 md:mb-0 pb-10 border-b border-gray-200">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">ID: {{sprintf("%09d", $entry->id)}}  {{ucfirst($entry->tipo)}} {{$entry->modo}}</h1>
                <div class="border-b-2 mb-3">

                    <div class="flex flex-wrap">
                        <div class="text-md italic text-gray-400 text-xs md:text-base">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="#239b56" viewBox="0 0 24 24" stroke="none">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <p class="leading-relaxed text-base">Fecha de la entrada: {{$entry->fecha->format('d/m/Y H:i:s')}}</p>
                    </div>

                    @if(isset($previousDatetime->fecha))
                    <div class="flex flex-wrap">
                        <div class="text-md italic text-gray-400 text-xs md:text-base">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="#21618c" viewBox="0 0 24 24" stroke="none">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <p class="leading-relaxed text-base">Fecha de fin: {{$previousDatetime->fecha->format('d/m/Y H:i:s')}}</p>
                    </div>
                    @endif

                <p class="leading-relaxed text-base">Duracion de la entrada: @if($entry->max('id') == $entry->id) <b>Actualmente activa</b>
                    @else {{$entry->fecha->diffInDays($previousDatetime->fecha)}} dias @endif</p>
                </div>
                    <span class="inline-block py-1 px-2 rounded bg-indigo-50 text-indigo-500 text-xs font-medium tracking-widest mb-2 mt-2">Datos del registro</span>
                    <p class="leading-relaxed text-base">Id de la peticion: </p>
                    <p class="leading-relaxed text-base">Fecha del registro: {{$entry->created_at->format('d/m/Y H:i:s')}}</p>
                    <p class="leading-relaxed text-base">Ultima actualizacion: {{$entry->updated_at->format('d/m/Y H:i:s')}}</p>
            </div>
            <div class="flex flex-col md:w-1/2 md:pl-12">
                <h2 class="title-font font-semibold text-gray-800 tracking-wider text-sm mb-3">Info</h2>
                <nav class="flex flex-wrap list-none -mb-1">
                    <li class="lg:w-1/3 mb-1 w-1/2">
                        <a class="text-gray-600 hover:text-gray-800">Mensajes: {{$entry->notices_count}}</a>
                    </li>
                    <li class="lg:w-1/3 mb-1 w-1/2">
                        <a class="text-gray-600 hover:text-gray-800">Logs: {{$entry->logs_count}}</a>
                    </li>
                </nav>
            </div>
        </div>
    </section>

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-5 mx-auto flex-wrap">
            <div class="lg:w-3/3 mx-auto">

                <div class="bg-gray-100 rounded flex mb-2 p-4 h-full items-center">
                    <span class="title-font font-medium font-semibold">Detecciones en esta entrada: {{$entry->detections->count()}}</span>
                </div>
                <div class="flex flex-wrap w-full relative mb-4  rounded shadow bg-white h-96 overflow-y-scroll">

                    <div class="p-4  md:w-full">

                        @if ($entry->detections->isNotEmpty())
                            @foreach ($entry->detections as $d)
                                <div class="flex border-2 rounded-lg  border-gray-200 border-opacity-50 p-8 sm:flex-row flex-col mb-2
                                @if($d->intrusismo == 1) bg-amber-400 @endif
                                ">
                                    <div class="flex-grow">
                                        <h2 class="text-gray-900 text-lg title-font font-medium mb-3"> Detección en {{$d->sensor->tipo}} @if($d->intrusismo == 1) <b>Intrusismo</b> @endif </h2>
                                        <p class="leading-relaxed text-base">Nº detecciones consecutivas: {{$d->umbral}}</p>
                                        <p class="leading-relaxed text-base">Modo de detección: {{ucfirst($d->modo_deteccion)}} @if($d->restaurado == 1) Restaurada @endif</p>
                                    </div>

                                    <div class="flex-grow">
                                        <p class="leading-relaxed text-base text-right"> Fecha: {{$d->fecha->format('d/m/Y H:i:s')}}</p>
                                        <p class="leading-relaxed text-base text-right"> Sensor: {{$d->sensor->tipo}}  {{$d->sensor->estado}} ({{$d->sensor->valor_sensor}})</p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="text-lg text-center">Sin detecciones</p>
                        @endif


                    </div>
                </div>
            </div>

        </div>

        <div class="flex flex-wrap -mx-2">
            @livewire('detail-notices')
            @livewire('detail-logs')
        </div>


    </section>
</div>
@else
    <div>Sin datos</div>
@endif

