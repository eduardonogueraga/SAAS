@if($detailDetection)
    <div class="flex items-center z-50 justify-center fixed left-0 bottom-0 w-full h-full bg-gray-800/25">
        <div class="bg-white rounded-lg w-1/2">
            <div class="flex flex-col items-start p-4">
                <div class="flex items-center w-full">
                    <div class="flex flex-wrap text-gray-900 font-medium text-lg">
                        <div class="text-md italic text-gray-400 text-xs md:text-base">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="@if($detailDetection->intrusismo) red @else #e47d09 @endif" viewBox="0 0 24 24" stroke="none">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Información sobre esta detección </h2>
                    </div>
                    <svg wire:click="{{$closeMethod}}" class="ml-auto fill-current text-gray-700 w-6 h-6 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"/>
                    </svg>
                </div>
                <hr>
                <div class="">
                    <div class="p-4 border-b">
                        <h2 class="text-2xl">
                            Detección en
                           @if(isset($detailDetection->sensor->terminal->nombre_terminal))
                                <b> {{$detailDetection->sensor->terminal->nombre_terminal}}</b> (Sensor: {{$detailDetection->sensor->tipo}})
                            @else
                               {{trans('data.sensor.literales.'.$detailDetection->sensor->tipo)}}
                            @endif
                               @if($detailDetection->intrusismo == 1) (<b>Intrusismo</b>)@endif
                        </h2>
                    </div>
                    <div class="grid grid-cols-3 items-center md:space-y-0 space-y-1 p-4 border-b ">
                        <p class="text-gray-600 font-bold">ID: {{sprintf("%09d", $detailDetection->id)}}</p>
                        <p class="text-gray-600 font-bold">Fecha: {{$detailDetection->fecha->format('d/m/Y H:i:s')}}</p>
                    </div>
                    <div class="grid grid-cols-2 md:space-y-0 items-center space-y-1 p-4 border-b ">
                        <p class="font-bold">Umbral maximo:</p>
                        <p>{{$detailDetection->umbral}}</p>
                        <p class="font-bold">Modo de detección:</p>
                        <p> {{ucfirst($detailDetection->modo_deteccion) }} @if($detailDetection->restaurado == 1) Restaurada @endif</p>
                    </div>
                    <div class="grid grid-cols-2 md:space-y-0 items-center space-y-1 p-4 border-b ">
                        <p class="font-bold">Detalles del sensor:</p>
                        @if(isset($detailDetection->sensor->terminal->nombre_terminal))
                            <p>Sensor número: {{$detailDetection->sensor->tipo}} Terminal: <b>{{$detailDetection->sensor->terminal->nombre_terminal}}</b> </p>
                        @else
                            <p>Sensor core: {{trans('data.sensor.literales.'.$detailDetection->sensor->tipo)}}</p>
                        @endif
                        <p class="font-bold">Estado del sensor:</p>
                        <p>{{$detailDetection->sensor->estado}}</p>
                        <p class="font-bold">Valor recogido:</p>
                        <p>{{$detailDetection->sensor->valor_sensor}}</p>
                    </div>
                    <div class="grid grid-cols-2 md:space-y-0 items-center space-y-1 p-4 border-b ">
                        <p class="font-bold">Fecha del registro:</p>
                        <p>{{$detailDetection->created_at->format('d/m/Y H:i:s')}}</p>
                        <p class="font-bold">Ultima actualizacion:</p>
                        <p>{{$detailDetection->updated_at->format('d/m/Y H:i:s')}}</p>
                        <p class="font-bold">Paquete:</p>
                        <p>
                            ID: {{sprintf("%09d", $detailDetection->package_id)}}
                            <svg class="inline-block h-6 w-6 ml-2" xmlns="http://www.w3.org/2000/svg" fill="#239b56" viewBox="0 0 24 24" stroke="none">
                                <path d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z"></path>
                            </svg>
                            <a class="inline-block text-xs text-blue-500 underline" href="{{ route('history.show', ['package' => $detailDetection->package_id]) }}"> (Ver en paquetes)</a>
                        </p>
                  </div>


                </div>
                <hr>

                <div class="ml-auto mt-2">
                    @if(!(in_array(Illuminate\Support\Str::afterLast(Request::path(), '/'), array('entry-manage-details', 'detail-notices', 'detail-logs'))))
                    <button wire:click="redirectToEntryPanel({{$detailDetection->entry_id}})" class="bg-transparent hover:bg-gray-500 text-green-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            Ver en panel
                    </button>
                    @endif
                    <button  wire:click="{{$closeMethod}}"class="bg-transparent hover:bg-gray-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                        Volver
                    </button>

                </div>
            </div>
        </div>
    </div>
@endif
