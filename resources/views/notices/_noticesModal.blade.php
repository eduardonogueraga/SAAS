@if($detailNotice)
<div class="flex items-center z-50 justify-center fixed left-0 bottom-0 w-full h-full bg-gray-800/25">
    <div class="bg-white rounded-lg w-1/2">
        <div class="flex flex-col items-start p-4">
            <div class="flex items-center w-full">
                <div class="flex flex-wrap text-gray-900 font-medium text-lg">
                        <div class="text-md italic text-gray-400 text-xs md:text-base">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="@if($detailNotice->tipo == 'sms') #21618c @else green @endif" viewBox="0 0 24 24" stroke="none">
                                @if($detailNotice->tipo == 'sms')
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                @else
                                    <path d="M17.924 2.617a.997.997 0 00-.215-.322l-.004-.004A.997.997 0 0017 2h-4a1 1 0 100 2h1.586l-3.293 3.293a1 1 0 001.414 1.414L16 5.414V7a1 1 0 102 0V3a.997.997 0 00-.076-.383z"></path>
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                                @endif
                            </svg>
                        </div>
                        <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Aviso {{ucfirst($detailNotice->tipo)}} </h2>
                </div>
                <svg wire:click="{{$closeMethod}}" class="ml-auto fill-current text-gray-700 w-6 h-6 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"/>
                </svg>
            </div>
            <hr>
            <div class="">
                <div class="p-4 border-b">
                    <h2 class="text-2xl">
                        @if($detailNotice->tipo == 'sms') Notificación SMS @else Llamada saliente @endif
                    </h2>
                </div>
                <div class="grid grid-cols-3 items-center md:space-y-0 space-y-1 p-4 border-b ">
                    <p class="text-gray-600 font-bold">ID: {{sprintf("%09d", $detailNotice->id)}}</p>
                    <p class="text-gray-600 font-bold">Teléfono: {{$detailNotice->telefono}}</p>
                    <p class="text-gray-600 font-bold">Fecha: {{$detailNotice->fecha->format('d/m/Y H:i:s')}}</p>
                </div>
                @if($detailNotice->tipo == 'sms')
                <div class="grid grid-cols-2 md:space-y-0 items-center space-y-1 p-4 border-b">
                    <p class="font-bold">Asunto</p>
                    <p>{{$detailNotice->asunto}}</p>
                    <p class="font-bold">Cuerpo</p>
                    <p>{{$detailNotice->cuerpo}}</p>
                </div>

                @endif
                <div class="grid grid-cols-2 md:space-y-0 items-center space-y-1 p-4 border-b">
                    <p class="font-bold">Fecha del registro:</p>
                    <p>{{$detailNotice->created_at->format('d/m/Y H:i:s')}}</p>
                    <p class="font-bold">Ultima actualizacion:</p>
                    <p>{{$detailNotice->updated_at->format('d/m/Y H:i:s')}}</p>
                    <p class="font-bold">Paquete:</p>
                    <p>ID: {{sprintf("%09d", $detailNotice->package_id)}}</p>
                </div>
            </div>
            <hr>

            <div class="ml-auto mt-2">
                @if(!(in_array(Illuminate\Support\Str::afterLast(Request::path(), '/'), array('entry-manage-details', 'detail-notices', 'detail-logs'))))
                <button wire:click="redirectToEntryPanel({{$detailNotice->entry_id}})" class="bg-transparent hover:bg-gray-500 text-green-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
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
