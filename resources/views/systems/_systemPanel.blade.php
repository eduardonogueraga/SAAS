<div id="content" class="bg-white/10 col-span-9 rounded-lg p-6">
    <div id="info">
        <div class="p-4">
            <h1 class="font-bold py-4 uppercase inline-block">Información sobre el sistema SAA</h1>
            <span class="inline-block ml-3 italic">Ultima actualización {{$d->updated_at}}</span>
        </div>

        <div id="stats" class="grid gird-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="p-6 rounded-lg @if($systemInfo->MODO_ALARMA) bg-white @else bg-yellow-200 @endif shadow-lg hover:bg-indigo-100">
                <div class="flex flex-row space-x-4 items-center">
                    <div id="stats-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium uppercase leading-4">Modo de acción</p>
                        <p class="font-bold text-2xl inline-flex items-center space-x-2">
                            <span> @if($systemInfo->MODO_ALARMA) Alarma en modo por defecto @else Alarma en modo de pruebas @endif </span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="p-6 rounded-lg bg-white shadow-lg hover:bg-indigo-100">
                <div class="flex flex-row space-x-4 items-center">
                    <div id="stats-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium uppercase leading-4">Tiempo encendido</p>
                        <p class="font-bold text-2xl inline-flex items-center space-x-2">
                            @php
                              $interval = \Carbon\CarbonInterval::seconds($systemInfo->TIEMPO_ENCENDIDO/1000);
                                $days = floor($interval->totalSeconds / 86400);
                                $hours = floor(($interval->totalSeconds % 86400) / 3600);
                                $minutes = floor(($interval->totalSeconds % 3600) / 60);
                                $seconds = $interval->totalSeconds % 60;

                                $formattedInterval = sprintf("%d dias %02d:%02d:%02d horas", $days, $hours, $minutes, $seconds);

                            @endphp
                            <span>{{$formattedInterval}}</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="p-6 rounded-lg @if($systemInfo->MODO_SENSIBLE) bg-white @else bg-yellow-200 @endif  shadow-lg hover:bg-indigo-100">
                <div class="flex flex-row space-x-4 items-center">
                    <div id="stats-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium uppercase leading-4">Modo sensible</p>
                        <p class="font-bold text-2xl inline-flex items-center space-x-2">
                            <span> @if($systemInfo->MODO_SENSIBLE) Activado @else Desactivado @endif </span>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div id="modulos">
        <h1 class="font-bold py-4 uppercase mb-3">Modulos del sistema</h1>
        <div id="stats" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            <div class="@if($systemInfo->MODULO_SD) bg-white @else bg-yellow-200 @endif  shadow-lg rounded-lg hover:bg-indigo-100">
                <div class="flex flex-row items-center">
                    <div class="text-3xl p-4">@if($systemInfo->MODULO_SD) ON @else OFF @endif</div>
                    <div class="p-2">
                        <p class="text-xl font-bold">Modulo SD</p>
                        <p class="text-gray-500 font-medium">Modulo para tarjeta SD</p>
                    </div>
                </div>
                <div class="border-t border-black/5 p-4">
                    <p class="inline-flex space-x-2 items-center text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                        <span>Info</span>
                    </p>
                </div>
            </div>
            <div class="@if($systemInfo->MODULO_RTC) bg-white @else bg-yellow-200 @endif  shadow-lg rounded-lg hover:bg-indigo-100">
                <div class="flex flex-row items-center">
                    <div class="text-3xl p-4">@if($systemInfo->MODULO_RTC) ON @else OFF @endif</div>
                    <div class="p-2">
                        <p class="text-xl font-bold">Modulo RTC</p>
                        <p class="text-gray-500 font-medium">Reloj del sistema</p>
                    </div>
                </div>
                <div class="border-t border-black/5 p-4">
                    <p class="inline-flex space-x-2 items-center text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                        <span>Info</span>
                    </p>
                </div>
            </div>
            <div class="@if($systemInfo->MODULO_BLUETOOTH) bg-white @else bg-yellow-200 @endif shadow-lg rounded-lg hover:bg-indigo-100">
                <div class="flex flex-row items-center">
                    <div class="text-3xl p-4">@if($systemInfo->MODULO_BLUETOOTH) ON @else OFF @endif</div>
                    <div class="p-2">
                        <p class="text-xl font-bold">Modulo bluetooth</p>
                        <p class="text-gray-500 font-medium">Modulo para comunicación bluetooth</p>
                    </div>
                </div>
                <div class="border-t border-black/5 p-4">
                    <p class="inline-flex space-x-2 items-center text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                        <span>Info</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div id="sensores">
        <h1 class="font-bold py-4 uppercase mb-3">Sensores</h1>
        <div id="stats" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            @foreach($systemSensores as $index => $s)
                <div class="@if($s) bg-white @else bg-yellow-200 @endif shadow-lg rounded-lg hover:bg-indigo-100">
                    <div class="flex flex-row items-center">
                        <div class="text-2xl p-4">@if($s) ONLINE @else OFFLINE @endif</div>
                        <div class="p-2">
                            <p class="text-xl font-bold">{{trans('data.sensor.literales.'. $index)}}</p>
                            <p class="text-gray-500 font-medium">Sensor</p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>

