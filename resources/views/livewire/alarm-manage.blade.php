<div class="container px-5 py-24 mx-auto">
    <div class="lg:w-4/5 mx-auto flex flex-wrap">

        <div class="lg:w-1/2 w-full lg:h-auto object-cover object-center rounded">
            @if($dataModal)
                @php $info = $data->filter(function($item) use($selectedRegister) {return $item->id == $selectedRegister;})->first() @endphp
                    @include('applogs._applogsModal', ['detailApplog'=>$info, 'closeMethod' =>'closeDataModal'])
            @endif
            <ul class="w-full h-screen overflow-auto shadow bg-white mt-5">
                @forelse($data as $d)
                <li wire:click.stop="openDataModal('{{$d->id}}')" class="shadow-lg pt-4 ml-2 mr-2 rounded-lg">
                    <div class="block bg-white py-3 border-t pb-4 hover:bg-yellow-100 cursor-pointer">
                        <div class="px-4 py-2 flex  justify-between">
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                </svg>
                                <span class="ml-3 text-sm font-semibold text-gray-900">ID: {{sprintf("%09d", $d->id)}} Log alarma</span>
                            </div>
                            <div class="flex">
                                <span class="px-4 text-sm font-semibold text-gray-600">Fecha: {{$d->created_at->format('d/m/Y H:i:s')}}</span>
                            </div>
                        </div>
                        <p class="px-4 py-2 text-sm font-semibold text-gray-700">{{Str::limit($d->respuesta_http,60)}}</p>
                    </div>
                </li>
                @empty
                    @include('shared._noData')
                @endforelse
                @include('shared._loadMoreRecords', ['collection'=>$data, 'loadMethod'=> 'loadMoreData'])
            </ul>
        </div>

        <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
            <h1 class="text-gray-900 text-3xl title-font font-medium mb-3">Panel de control</h1>
            @include('shared._errors')
            <div class="bg-white rounded-lg shadow-md">
                <div class="p-6">
                    <form wire:submit.prevent="submit">
                        {{ csrf_field() }}
                        <div class="flex items-center mb-4">
                            <div class="w-3/4">
                                <h2 class="my-2 font-bold">Activar alarma y avisos</h2>
                            </div>
                            <div class="w-3/4">
                                <h2 class="my-2 font-bold">Frecuencia de comprobación</h2>
                            </div>
                        </div>
                        <div class="flex items-center mb-4">
                            <div class="w-3/4">
                                <label class="block text-gray-700 font-medium mb-2">
                                    <input type="checkbox" wire:model="alarmStatus" class="form-checkbox ml-2">
                                    Alarma
                                    <input type="checkbox"  wire:model="noticeStatus" class="form-checkbox ml-2">
                                    Avisos
                                </label>
                            </div>
                            <div class="w-3/4">
                                <select name="periodo" wire:model="frecuenyTime" class="form-select rounded border">
                                    @foreach(trans('alarm.settings.form.time') as $value => $text)
                                        <option value="{{ $value }}" {{ request('periodo') === $value ? 'selected' : '' }} >{{ $text }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="flex items-center mb-4">
                            <div class="w-3/4">
                                <h2 class="my-2 font-bold">Número de reintentos</h2>
                            </div>
                        </div>
                        <div class="flex items-center mb-4">
                            <div class="w-3/4">
                                <select name="intentos" wire:model="numIntentos" class="form-select rounded border">
                                    @foreach(trans('alarm.settings.form.intent') as $value => $text)
                                        <option value="{{ $value }}" {{ request('intentos') === $value ? 'selected' : '' }} >{{ $text }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">
                            Guardar
                        </button>
                    </form>
                </div>
            </div>

            <div class="flex border-t border-gray-200 py-2">
                <span class="text-gray-500">Estado de la alarma</span>
                <span class="ml-auto text-gray-900">{{trans('alarm.settings.form.desc.'. $alarmSettings->activa)}}</span>
            </div>
            <div class="flex border-t border-gray-200 py-2">
                <span class="text-gray-500">Envio notificaciones</span>
                <span class="ml-auto text-gray-900">@if($alarmSettings->notificaciones) Si @else No @endif</span>
            </div>
            <div class="flex border-t border-gray-200 py-2">
                <span class="text-gray-500">Ultima ejecución</span>
                <span class="ml-auto text-gray-900">{{$alarmSettings->ultima_ejecucion->format('d/m/Y')}}</span>
            </div>
            <div class="flex border-t border-gray-200 py-2">
                <span class="text-gray-500">Num de intentos de gracia</span>
                <span class="ml-auto text-gray-900">{{$alarmSettings->max_intentos}}</span>
            </div>
            <div class="flex border-t border-b mb-6 border-gray-200 py-2">
                <span class="text-gray-500">Tiempo de comprobación:</span>
                <span class="ml-auto text-gray-900">{{trans('alarm.settings.form.time.'. $alarmSettings->periodo)}}</span>
            </div>
        </div>
    </div>
</div>
