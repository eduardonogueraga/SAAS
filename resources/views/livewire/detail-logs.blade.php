@if($logsLists->count())
<div class="px-2 w-1/2">
        <div class="bg-gray-100 rounded flex mb-2  p-4  items-center">
            <span class="title-font font-medium font-semibold">Logs en esta entrada:{{$logsLists->count()}} </span>
        </div>
        <div class="flex flex-wrap w-full relative mb-4  rounded shadow bg-white h-96 overflow-y-scroll">
            @if($dataModal)
                @php $info = $logsLists->filter(function($item) use($selectedRegister) {return $item->id == $selectedRegister;})->first() @endphp
                @include('logs._logsModal', ['detailLog'=>$info, 'closeMethod' =>'closeDataModal'])
            @endif
            <ul class="p-4  md:w-full">
                @foreach ($logsLists as $l)
                    <li wire:click.stop="openDataModal('{{$l->id}}')" class="flex border-2 rounded-lg  border-gray-200 border-opacity-50 p-8 sm:flex-row flex-col mb-2 cursor-pointer hover:bg-yellow-100">
                        <div class="flex pr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                            </svg>
                        </div>
                        <div class="flex-grow">
                            <h4 class="text-gray-900 text-md title-font font-medium mb-3">Log [{{$l->fecha->format('d/m/Y H:i:s')}}]</h4><span>[ID-{{sprintf("%09d",$l->id)}}]</span>
                            <p class="font-light">{{trans('data.logs.literales.'.$l->descripcion)}}</p>
                        </div>
                    </li>
                @endforeach
                @include('shared._loadMoreRecords', ['collection'=>$logsLists, 'loadMethod'=> 'loadMoreLog'])

            </ul>
        </div>
</div>
@else
    @include('shared._emptyList', ['name'=> 'logs'])
@endif
