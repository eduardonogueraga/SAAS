<x-app-layout>
    <!-- component -->
    <main class="flex w-full h-full shadow-lg rounded-3xl">
        <section class="flex flex-col pt-3 w-4/12 bg-gray-50 h-full">
            @livewire('entry-manage-sidebar')
        </section>
        <section class="w-8/12 px-4 flex flex-col bg-white rounded-r-3xl">
            <div class="flex justify-between items-center h-48 border-b-2 mb-8">
                <div class="flex space-x-4 items-center">
                    <div class="h-12 w-12 rounded-full overflow-hidden">

                    </div>
                    <div class="flex flex-col">
                        <h3 class="font-semibold text-lg">Akhil Gautam</h3>
                        <p class="text-light text-gray-400">akhil.gautam123@gmail.com</p>
                    </div>
                </div>
            </div>
            <section>
                <h1 class="font-bold text-2xl">We need UI/UX designer</h1>
                <article class="mt-8 text-gray-500 leading-7 tracking-wider">
                    <p>Hi Akhil,</p>
                    <p>Design and develop enterprise-facing UI and consumer-facing UI as well as
                        REST API
                        backends.Work with
                        Product Managers and User Experience designers to create an appealing user experience for desktop web and
                        mobile web.</p>
                    <footer class="mt-12">
                        <p>Thanks & Regards,</p>
                        <p>Alexandar</p>
                    </footer>
                </article>

            </section>

        </section>
    </main>
</x-app-layout>


