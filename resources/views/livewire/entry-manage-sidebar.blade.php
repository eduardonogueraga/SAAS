<div class="h-screen overflow-y-scroll">
    <ul class="mt-6">

                <li x-data="{ select: false }"
                    x-on:click="select = ! select"
                    {{--                    x-bind:class="select ? 'bg-yellow-100' : 'hover:bg-indigo-100'"--}}
                    x-on:click.away="select = false"
                    class="py-5 px-5 transition p-4 border-l-8

                        border-red-600
                    "
                    wire:click="$emit('orderSelected', 1)">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold">PEDIDO:
                        </h3>
                        <p class="text-green-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.121 15.536c-1.171 1.952-3.07 1.952-4.242 0-1.172-1.953-1.172-5.119 0-7.072 1.171-1.952 3.07-1.952 4.242 0M8 10.5h4m-4 3h4m9-1.5a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </p>
                    </div>
                    <div class="text-md italic text-gray-400"> Articulos)</div>
                    <div class="text-md text-gray-400 text-right">fed</div>
                </li>




            <li class="py-5  px-5 transition p-4 border-r-8 border-yellow-600">
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-semibold"></h3>
                </div>
            </li>

    </ul>
</div>
