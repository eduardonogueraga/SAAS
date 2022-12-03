@if($entry)
    <section class="text-gray-600 body-font">
        <div class="container flex flex-wrap px-5 py-24 mx-auto items-center">
            <div class="md:w-1/2 md:pr-12 md:py-8 md:border-r md:border-b-0 mb-10 md:mb-0 pb-10 border-b border-gray-200">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">ID: {{sprintf("%06d", $entry->id)}}  {{ucfirst($entry->tipo)}} {{$entry->modo}}</h1>
                <p class="leading-relaxed text-base">Locavore cardigan small batch roof party blue bottle blog meggings sartorial jean shorts kickstarter migas sriracha church-key synth succulents. Actually taiyaki neutra, distillery gastropub pok pok ugh.</p>

                @if ($entry->detections->isNotEmpty())
                    @foreach ($entry->detections as $d)
                        <div class="text-lg text-center">{{$d->modo_deteccion}} :{{$d->sensor->tipo}} </div>
                    @endforeach
                @else
                    <p class="text-lg text-center">Sin detecciones</p>
                @endif
                <a class="text-purple-500 inline-flex items-center mt-4">Learn More
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
            <div class="flex flex-col md:w-1/2 md:pl-12">
                <h2 class="title-font font-semibold text-gray-800 tracking-wider text-sm mb-3">Acciones</h2>
                <nav class="flex flex-wrap list-none -mb-1">
                    <li class="lg:w-1/3 mb-1 w-1/2">
                        <a class="text-gray-600 hover:text-gray-800">Mensajes</a>
                    </li>
                    <li class="lg:w-1/3 mb-1 w-1/2">
                        <a class="text-gray-600 hover:text-gray-800">Logs</a>
                    </li>
                </nav>
            </div>
        </div>
    </section>

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-5 mx-auto flex-wrap">
            <div class="lg:w-3/3 mx-auto">
                <div class="flex flex-wrap w-full relative mb-4  rounded shadow bg-white h-96 overflow-y-scroll">

                    <div class="p-4  md:w-full">

                        <div class="flex border-2 rounded-lg border-gray-200 border-opacity-50 p-8 sm:flex-row flex-col mb-2">
                            <div class="flex-grow">
                                <h2 class="text-gray-900 text-lg title-font font-medium mb-3">The Catalyzer</h2>
                                <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four dollar toast vegan taxidermy. Gastropub indxgo juice poutine.</p>
                            </div>
                        </div>

                        <div class="flex border-2 rounded-lg border-gray-200 border-opacity-50 p-8 sm:flex-row flex-col mb-2">
                            <div class="flex-grow">
                                <h2 class="text-gray-900 text-lg title-font font-medium mb-3">The Catalyzer</h2>
                                <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four dollar toast vegan taxidermy. Gastropub indxgo juice poutine.</p>
                            </div>
                        </div>

                        <div class="flex border-2 rounded-lg border-gray-200 border-opacity-50 p-8 sm:flex-row flex-col mb-2">
                            <div class="flex-grow">
                                <h2 class="text-gray-900 text-lg title-font font-medium mb-3">The Catalyzer</h2>
                                <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four dollar toast vegan taxidermy. Gastropub indxgo juice poutine.</p>
                            </div>
                        </div>

                        <div class="flex border-2 rounded-lg border-gray-200 border-opacity-50 p-8 sm:flex-row flex-col mb-2">
                            <div class="flex-grow">
                                <h2 class="text-gray-900 text-lg title-font font-medium mb-3">The Catalyzer</h2>
                                <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four dollar toast vegan taxidermy. Gastropub indxgo juice poutine.</p>
                            </div>
                        </div>

                        <div class="flex border-2 rounded-lg border-gray-200 border-opacity-50 p-8 sm:flex-row flex-col mb-2">
                            <div class="flex-grow">
                                <h2 class="text-gray-900 text-lg title-font font-medium mb-3">The Catalyzer</h2>
                                <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four dollar toast vegan taxidermy. Gastropub indxgo juice poutine.</p>
                            </div>
                        </div>

                        <div class="flex border-2 rounded-lg border-gray-200 border-opacity-50 p-8 sm:flex-row flex-col mb-2">
                            <div class="flex-grow">
                                <h2 class="text-gray-900 text-lg title-font font-medium mb-3">The Catalyzer</h2>
                                <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four dollar toast vegan taxidermy. Gastropub indxgo juice poutine.</p>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>


                <div class="flex flex-wrap -mx-2">
                    <div class="px-2 w-1/2">
                        <div class="flex flex-wrap w-full bg-gray-100 sm:py-24 py-16 sm:px-10 px-6 relative">
                            <div class="text-center relative z-10 w-full">
                                <h2 class="text-xl text-gray-900 font-medium title-font mb-2">Shooting Stars</h2>
                                <p class="leading-relaxed">Skateboard +1 mustache fixie paleo lumbersexual.</p>
                                <a class="mt-3 text-purple-500 inline-flex items-center">Learn More
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="px-2 w-1/2">
                        <div class="flex flex-wrap w-full bg-gray-100 sm:py-24 py-16 sm:px-10 px-6 relative">
                            <div class="text-center relative z-10 w-full">
                                <h2 class="text-xl text-gray-900 font-medium title-font mb-2">Shooting Stars</h2>
                                <p class="leading-relaxed">Skateboard +1 mustache fixie paleo lumbersexual.</p>
                                <a class="mt-3 text-purple-500 inline-flex items-center">Learn More
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@else
    <div>Sin datos</div>
@endif

