<header class="text-gray-600 body-font">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a href="{{route('panel.index')}}"  class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
            <span class="ml-3 text-xl">SAAS</span>
        </a>
        <nav class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-400 flex flex-wrap items-center text-base justify-center">
            <a href="{{route('panel.index')}}" class="mr-5 hover:text-gray-900 @if(request()->routeIs('panel.index')) font-bold @endif">Panel de control</a>
            <a  href="{{route('data.index')}}" class="mr-5 hover:text-gray-900 @if(request()->routeIs('data.index')) font-bold @endif">Datos</a>
            <a href="{{route('history.index')}}" class="mr-5 hover:text-gray-900 @if(request()->routeIs('history.index')) font-bold @endif">Paquetes</a>
            <a class="mr-5 hover:text-gray-900">Configuración y avisos</a>
        </nav>
        <button class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">Usuarios
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
        </button>
    </div>
</header>
