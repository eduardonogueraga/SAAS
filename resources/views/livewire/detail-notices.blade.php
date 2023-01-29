@if($noticeLists->count())
<div class="px-2 w-1/2">
    <div class="bg-gray-100 rounded flex mb-2  p-4  items-center">
        <span class="title-font font-medium font-semibold">Avisos en esta entrada: {{$noticeLists->count()}} </span>
    </div>
    <div class="flex flex-wrap w-full relative mb-4  rounded shadow bg-white h-96 overflow-y-scroll">
        @if($dataModal)
            @php $detailNotice = $noticeLists->filter(function($item) use($selectedRegister) {return $item->id == $selectedRegister;})->first() @endphp
            @include('notices._noticesModal', ['detailNotice'=>$detailNotice, 'closeMethod' =>'closeDataModal'])
        @endif
        <ul class="p-4  md:w-full">
            @foreach ($noticeLists as $n)
                <li wire:click.stop="openDataModal('{{$n->id}}')" class="flex border-2 rounded-lg  border-gray-200 border-opacity-50 p-8 sm:flex-row flex-col mb-2  cursor-pointer hover:bg-yellow-100" >
                    <div class="flex-grow">
                        <div class="flex flex-wrap">
                            <div class="text-md italic text-gray-400 text-xs md:text-base">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="@if($n->tipo == 'sms') #21618c @else green @endif" viewBox="0 0 24 24" stroke="none">
                                    @if($n->tipo == 'sms')
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                    @else
                                    <path d="M17.924 2.617a.997.997 0 00-.215-.322l-.004-.004A.997.997 0 0017 2h-4a1 1 0 100 2h1.586l-3.293 3.293a1 1 0 001.414 1.414L16 5.414V7a1 1 0 102 0V3a.997.997 0 00-.076-.383z"></path>
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                                    @endif
                                </svg>
                            </div>
                            <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Aviso {{ucfirst($n->tipo)}} </h2><span>[ID-{{sprintf("%09d",$n->id)}}]</span>
                        </div>
                        <p class="font-light">@if($n->tipo == 'sms') {{Str::limit(trans('data.notices.literales.'.$n->asunto),25)}} @else Tlf: {{trans('data.notices.tlf.'.$n->telefono)}} @endif</p>

                    </div>

                    <div class="flex-grow">
                        <p class="leading-relaxed text-base text-right"> Fecha: {{$n->fecha->format('d/m/Y H:i:s')}}</p>
                    </div>
                </li>
            @endforeach
            @include('shared._loadMoreRecords', ['collection'=>$noticeLists, 'loadMethod'=> 'loadMoreNotices'])

        </ul>
    </div>
</div>
@else
    @include('shared._emptyList', ['name'=> 'avisos'])
@endif
