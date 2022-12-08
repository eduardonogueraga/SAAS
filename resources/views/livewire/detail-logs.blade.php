@if($logsLists->count())
<div class="px-2 w-1/2">
        <div class="bg-gray-100 rounded flex mb-2  p-4  items-center">
            <span class="title-font font-medium font-semibold">Logs en esta entrada:{{$logsLists->count()}} </span>
        </div>
        <div class="flex flex-wrap w-full relative mb-4  rounded shadow bg-white h-96 overflow-y-scroll">

            <ul class="p-4  md:w-full">
                @foreach ($logsLists as $l)
                    <li class="flex border-2 rounded-lg  border-gray-200 border-opacity-50 p-8 sm:flex-row flex-col mb-2">
                        <div class="flex-grow">
                            <h4 class="text-gray-900 text-md title-font font-medium mb-3">Log [{{$l->fecha->format('d/m/Y H:i:s')}}]</h4>
                            <p class="font-light">{{$l->descripcion}}</p>
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
