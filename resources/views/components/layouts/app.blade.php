<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'CodeGuard' }}</title>

    @vite('resources/css/app.css')
    @livewireStyles
    <style>
        /* This will hide the scrollbar for the sidebar when it is not hovered over */
        #sidebar::-webkit-scrollbar {
            display: none;
        }

        #sidebar {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }

        h1 {
            color: white;
            text-shadow:
                -1px -1px 0 #000,
                1px -1px 0 #000,
                -1px 1px 0 #000,
                1px 1px 0 #000;
        }

    </style>
</head>
<body class="text-white flex bg-gray-800">
<aside id="sidebar" class="transform top-0 left-0 w-64 bg-gray-800 border-r border-r-gray-900 text-white fixed h-full overflow-auto ease-in-out transition-all duration-300 z-30 -translate-x-full md:translate-x-0">
    <!-- Sidebar content -->
    <div class="px-8">
        <div class="flex justify-center items-center pt-8">
            <img src="logo.webp" class="h-10 w-10 sm:h-20 sm:w-20 mb-5 rounded" alt="Logo">
            <h1 class="text-xl font-semibold align-middle mb-3 mt-0 ml-4">License System</h1>
        </div>
        <nav>
            <a wire:navigate href="{{route('dashboard')}}" class="block py-2.5 px-4 rounded transition duration-200 hover:translate-x-5 ease-in-out delay-75 translate-x-0 hover:bg-green-700">
                Dashboard
            </a>
            <a wire:navigate href="{{route('license')}}" class="block py-2.5 px-4 rounded transition duration-200 hover:translate-x-5 ease-in-out delay-75 translate-x-0 hover:bg-green-700">
                Licenses
            </a>
            <a wire:navigate href="{{route('application')}}" class="block py-2.5 px-4 rounded transition duration-200 hover:translate-x-5 ease-in-out delay-75 translate-x-0 hover:bg-green-700">
                Applications
            </a>
            <a wire:navigate href="{{route('session')}}" class="block py-2.5 px-4 rounded transition duration-200 hover:translate-x-5 ease-in-out delay-75 translate-x-0 hover:bg-green-700">
                Sessions
            </a>
            <div class="px-4 py-2 bg-gray-800 rounded text-white hover:translate-x-5 ease-in-out delay-75 translate-x-0 hover:bg-green-700">
                <form method="POST" action="{{ route('logout') }}" class="">
                    @csrf
                    <h1 onclick="event.preventDefault();
                                                this.closest('form').submit();" class="text-sm md:text-lg"> Abmelden </h1>
                </form>
            </div>
        </nav>
    </div>
</aside>

<div class="flex-1 flex flex-col ml-8 md:ml-64 bg-gray-800">
    <button id="toggleSidebar" class="focus:outline-none absolute top-0 left-0 mt-4 ml-4 z-40 md:hidden" onclick="toggleSidebar()">
        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
        </svg>
    </button>
    {{ $slot }}
</div>
@livewireScripts
</body>
<script>
    // Toggle the sidebar
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('-translate-x-full');
    }
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<x-livewire-alert::scripts />
</html>
