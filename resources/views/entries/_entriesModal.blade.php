@if($detailEntry)
    <div class="flex items-center z-50 justify-center fixed left-0 bottom-0 w-full h-full bg-gray-800/25">
        <div class="bg-white rounded-lg w-1/2">
            <div class="flex flex-col items-start p-4">
                <div class="flex items-center w-full">
                    <div class="flex flex-wrap text-gray-900 font-medium text-lg">
                        <div class="text-md italic text-gray-400 text-xs md:text-base">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="@if($detailEntry->tipo == 'activacion') #21618c @else green @endif" viewBox="0 0 24 24" stroke="none">
                                @if($detailEntry->tipo == 'activacion')
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                                @else
                                    <path d="M10 2a5 5 0 00-5 5v2a2 2 0 00-2 2v5a2 2 0 002 2h10a2 2 0 002-2v-5a2 2 0 00-2-2H7V7a3 3 0 015.905-.75 1 1 0 001.937-.5A5.002 5.002 0 0010 2z"></path>
                                @endif
                            </svg>
                        </div>
                        <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Información sobre esta entrada </h2>
                    </div>
                    <svg wire:click="{{$closeMethod}}" class="ml-auto fill-current text-gray-700 w-6 h-6 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"/>
                    </svg>
                </div>
                <hr>
                <div class="">
                    <div class="p-4 border-b">
                        <h2 class="text-2xl">
                            @if($detailEntry->tipo == 'activacion') Activacion de la alarma @else Desactivacion de la alarma @endif
                        </h2>
                    </div>
                    <div class="grid grid-cols-3 items-center md:space-y-0 space-y-1 p-4 border-b ">
                        <p class="text-gray-600 font-bold">ID: {{sprintf("%09d", $detailEntry->id)}}</p>
                        <p class="text-gray-600 font-bold">Modo de ejecución : {{ucfirst($detailEntry->modo)}}</p>
                        <p class="text-gray-600 font-bold">Fecha: {{$detailEntry->fecha->format('d/m/Y H:i:s')}}</p>
                    </div>
                    <div class="grid grid-cols-2 md:space-y-0 items-center space-y-1 p-4 border-b ">
                        <p class="font-bold">Estado de la entrada</p>
                        <p>  @if($detailEntry->restaurada) Esta entrada ha sido restaurada desde un estado anterior: @else OK @endif</p>
                        <p class="font-bold">Veces que la entrada ha sido reactivada automáticamente:</p>
                        <p>{{$detailEntry->intentos_reactivacion}}</p>
                        <p class="font-bold">Version del sistema SAA:</p>
                        <p>{{$detailEntry->saa_version}}</p>
                    </div>
                    <div class="grid grid-cols-2 md:space-y-0 items-center space-y-1 p-4 border-b ">
                        <p class="font-bold">Fecha del registro:</p>
                        <p>{{$detailEntry->created_at->format('d/m/Y H:i:s')}}</p>
                        <p class="font-bold">Ultima actualizacion:</p>
                        <p>{{$detailEntry->updated_at->format('d/m/Y H:i:s')}}</p>
                        <p class="font-bold">Paquete:</p>
                        <a class="text-blue-600 hover:underline" href="{{ route('history.show', ['package' => $detailEntry->package_id]) }}">ID: {{sprintf("%09d", $detailEntry->package_id)}}</a>
                    </div>


                </div>
                <hr>

                <div class="ml-auto mt-2">
                    <button wire:click="redirectToEntryPanel({{$detailEntry->id}})" class="bg-transparent hover:bg-gray-500 text-green-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                        Ver en panel
                    </button>
                    <button  wire:click="{{$closeMethod}}"class="bg-transparent hover:bg-gray-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                        Volver
                    </button>

                </div>
            </div>
        </div>
    </div>
@endif
