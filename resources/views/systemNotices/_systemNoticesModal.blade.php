@if($detaiSysNoticeLog)
    <div class="flex items-center z-50 justify-center fixed left-0 bottom-0 w-full h-full bg-gray-800/25">
        <div class="bg-white rounded-lg w-1/2">
            <div class="flex flex-col items-start p-4">
                <div class="flex items-center w-full">
                    <div class="flex flex-wrap text-gray-900 font-medium text-lg">
                        <div class="text-md italic text-gray-400 text-xs md:text-base">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" fill="#21618c" viewBox="0 0 20 20" stroke="none">
                                <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"></path>
                                <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z"></path>
                            </svg>
                        </div>
                        <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Información sobre este aviso</h2>
                    </div>
                    <svg wire:click="{{$closeMethod}}" class="ml-auto fill-current text-gray-700 w-6 h-6 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"/>
                    </svg>
                </div>
                <hr>
                <div class="">
                    <div class="p-4 border-b">
                        <h2 class="text-2xl">
                            Notificacion del sistema SAA
                        </h2>
                    </div>
                    <div class="grid grid-cols-3 items-center md:space-y-0 space-y-1 p-4 border-b ">
                        <p class="text-gray-600 font-bold">ID: {{sprintf("%09d", $detaiSysNoticeLog->id)}}</p>
                        <p class="text-gray-600 font-bold">Fecha: {{$detaiSysNoticeLog->fecha->format('d/m/Y H:i:s')}}</p>
                    </div>
                    <div class="grid grid-cols-2 md:space-y-0 items-center space-y-1 p-4 border-b ">
                        <p class="font-bold">Tipo</p>
                        <p class="font-bold">@if($detaiSysNoticeLog->tipo === 'sys') Informe del sistema @else Alarma presencia detectada @endif</p>
                    </div>
                    <div class="grid grid-cols-2 md:space-y-0 items-center space-y-1 p-4 border-b ">
                        <p class="font-bold">Estado notificación</p>
                        @if($detaiSysNoticeLog->procesado)
                            <p>Procesado</p>
                        @else
                            <p>Pendiente</p>
                        @endif
                    </div>
                    <div class="grid grid-cols-2 md:space-y-0 items-center space-y-1 p-4 border-b ">
                        @if($detaiSysNoticeLog->desc)
                            <p class="font-bold">Detalle del aviso</p>
                            <textarea readonly class="w-full">{{$detaiSysNoticeLog->desc}}</textarea>
                        @endif
                    </div>
                    <div class="grid grid-cols-2 md:space-y-0 items-center space-y-1 p-4 border-b ">
                        <p class="font-bold">Fecha del registro:</p>
                        <p>{{$detaiSysNoticeLog->created_at->format('d/m/Y H:i:s')}}</p>
                        <p class="font-bold">Fecha de procesado:</p>
                        <p>{{$detaiSysNoticeLog->updated_at->format('d/m/Y H:i:s')}}</p>
                    </div>
                </div>
                <hr>

                <div class="ml-auto mt-2">
                    <button  wire:click="{{$closeMethod}}"class="bg-transparent hover:bg-gray-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                        Volver
                    </button>

                </div>
            </div>
        </div>
    </div>
@endif
