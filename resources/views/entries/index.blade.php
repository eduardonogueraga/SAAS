<x-app-layout>
    <main class="flex w-full h-full shadow-lg">
        <section class="flex flex-col pt-3 w-4/12 bg-gray-50 h-full">
            @livewire('entry-manage-sidebar')
        </section>
        <section class="w-8/12 px-4 flex flex-col bg-white ">
            @livewire('entry-manage-details')
        </section>
    </main>
</x-app-layout>


