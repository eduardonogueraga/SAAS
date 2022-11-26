<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Snippet -->
            <section class="flex flex-col justify-center antialiased bg-gray-100 text-gray-600 min-h-screen p-4">
                <div class="h-full">
                    <!-- Table -->

                    <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                        <header class="px-5 py-4 border-b border-gray-100">
                            <h2 class="font-semibold text-gray-800">Entradas</h2>
                        </header>
                        <div class="p-3">
                            <div class="overflow-x-auto">
                                @if ($entries->isNotEmpty())
                                <table class="table-auto w-full">
                                    <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                    <tr>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Id</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Tipo</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-center">Modo</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-center">Fecha</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-center">Detecciones</div>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-sm divide-y divide-gray-100">
                                    @foreach ($entries as $row)
                                    <tr>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-lg text-center">{{$row->id}}</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-lg text-center">{{$row->tipo}}</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-lg text-center">{{$row->modo}}</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-lg text-center">{{$row->fecha}}</div>
                                        </td>

                                        <td class="p-2 whitespace-nowrap">
                                            @if ($row->detections->isNotEmpty())
                                                @foreach ($row->detections as $d)
                                              <div class="text-lg text-center">{{$d->modo_deteccion}} :{{$d->sensor->tipo}} </div>
                                                @endforeach
                                            @else
                                                <div class="text-lg text-center">Sin detecciones</div>
                                            @endif
                                        </td>

                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @else
                                    <div>
                                        No hay datos
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>

</x-app-layout>
