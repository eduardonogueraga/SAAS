<div>
    <div class="flex justify-between items-center h-48 border-b-2 mb-8">
    </div>
    <div class="h-screen overflow-y-scroll">
        <ul class="mt-6">
            @if ($entries->isNotEmpty())
                @foreach ($entries as $row)

                    <li wire:click="$emit('entrySelected', {{$row->id}})" class="items-center flex-auto py-5 px-2 md:px-5 transition duration-500 border-l-8 cursor-pointer {{$select==$row->id ? 'bg-blue-100  selected':'hover:bg-yellow-100'}}
                    @if ($row->tipo === 'activacion')
                            border-red-600
                    @elseif ($row->tipo === 'desactivacion')
                                border-green-200
                    @else
                         border-gray-200
                    @endif
                    ">
                        <div class="content">
                            <div class="flex justify-between items-center">
                                <h3 class="selected-title text-sm md:text-lg w-48 py-2 font-semibold main-color-blue-text dark:main-color-yellow-text transition duration-500">
                                    [ ID: {{sprintf("%06d", $row->id)}} ] {{ucfirst($row->tipo)}} {{$row->modo}}</h3>
                                <div class="text-md italic text-gray-400 text-xs md:text-base">
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="blue" viewBox="0 0 24 24" stroke="none">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                    </svg>
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="green" viewBox="0 0 24 24" stroke="none">
                                        <path d="M17.924 2.617a.997.997 0 00-.215-.322l-.004-.004A.997.997 0 0017 2h-4a1 1 0 100 2h1.586l-3.293 3.293a1 1 0 001.414 1.414L16 5.414V7a1 1 0 102 0V3a.997.997 0 00-.076-.383z"></path>
                                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="text-md italic text-gray-400 text-xs md:text-base">Rango de fechas</div>
                            <div class="text-md text-gray-400 text-right text-xs md:text-base">{{$row->fecha->diffForHumans()}}</div>
                        </div>
                    </li>
                @endforeach
                @if($entries->hasMorePages())
                    <div x-data="{
                        observe () {
                            let observer = new IntersectionObserver((entries) => {
                                entries.forEach(entry => {
                                    if (entry.isIntersecting) {
                                        @this.call('loadMore')
                                    }
                                })
                            }, {
                                root: null
                            })
                            observer.observe(this.$el)
                        }
                    }"
                         x-init="observe">
                        @include('shared._loading')
                    </div>
                @endif
            @else
                <li class="py-5  px-5 transition p-4 border-r-8 border-gary-600">
                    <div class="flex justify-between items-center">
                        <h3 class="text-sm md:text-lg font-semibold main-color-blue-text dark:main-color-yellow-text transition duration-500">No hay entradas disponibles</h3>
                    </div>
                </li>
            @endif
        </ul>
    </div>
</div>
