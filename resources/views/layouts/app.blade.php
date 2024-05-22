<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SIUJI') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!-- Scripts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-neutral-100">
    <div class="drawer lg:drawer-open">
        <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col">
            <!-- Navbar -->
            <div class="w-full navbar bg-secondary bg-opacity-10">
                <div class="text-white flex-none lg:hidden tooltip tooltip-bottom" data-tip="menu">
                    <label for="my-drawer-3" aria-label="open sidebar" class="btn btn-square btn-ghost text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </label>
                </div>

                @yield('breadcrumbs')

                <div class="flex-none lg:block">
                    <ul class="menu menu-horizontal">
                        {{-- Navbar menu content here --}}
                        <div class="flex-none">
                            <ul class="menu menu-horizontal px-1">
                                <li>
                                    <details>
                                        <summary class="font-bold text-primary"> {{Auth::user()->name}}</summary>
                                        <ul class="bg-base-100 rounded-t-none">
                                            <li>
                                                <x-dropdown-link :href="route('profile.edit')"> Profile </x-dropdown-link>
                                            <li>
                                                <!-- Authentication -->
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                                            this.closest('form').submit();">
                                                        Logout
                                                    </x-dropdown-link>
                                                </form>
                                            </li>
                                        </ul>
                                    </details>
                                </li>
                            </ul>
                        </div>
                    </ul>
                </div>
            </div>
            {{--MAIN PAGE--}}
            <main>
                <div class="p-2 rounded-xl">
                    {{$slot ?? ''}}
                </div>
            </main>
        </div>
        {{-- Sidebar --}}
        <div class="drawer-side shadow-lg">
            <label for="my-drawer-3" aria-label="close sidebar" class="drawer-overlay"></label>
            <ul class="menu p-4 w-40 sm:w-80 min-h-full bg-secondary text-white">
                <!-- Sidebar content here -->
                <div class="flex border-b items-center p-2 mb-2">
                    <img class="w-9 h-9" src="{{ asset('icons/small-logo.jpg') }}" alt="logo">
                    <label class="font-bold text-sm w-36 m-2 hidden sm:block">SISTEM UJIAN SMAN 3 JEMBER</label>
                </div>
                <div>
                    <li>
                        <a class="my-2" href="{{ route('admin.dashboard')}}">
                            <img class="w-7 h-7" src="{{ asset('icons/dashboard.png') }}" alt="">
                            <span class="hidden sm:block">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <span class="hidden sm:flex">
                            <img class="w-7 h-7" src="{{ asset('icons/Groups.png') }}" alt="">
                            Data</span>
                        <a class="my-2" href="{{route('students.index')}}">
                            <span class="hidden sm:block mx-16">Murid</span>
                        </a>
                        <a class="my-2" href="{{ route('users.index') }}">
                            <span class="hidden sm:block mx-16">Guru</span>
                        </a>
                    </li>
                    <li>
                        <a class="my-2">
                            <img class="w-7 h-7" src="{{ asset('icons/books.png') }}" alt="">
                            <span class="hidden sm:block">Ujian</span>
                        </a>
                        <a class="my-2" href="{{route('banks.index')}}">
                            <span class="hidden sm:block mx-16">Bank Soal</span>
                        </a>
                        <a class="my-2" href="{{route('ujian.index')}}">
                            <span class="hidden sm:block mx-16">Penjadwalan</span>
                        </a>
                        <a class="my-2" href="#">
                            <span class="hidden sm:block mx-16">Riwayat Ujian</span>
                        </a>
                        {{-- <a class="my-2" href="{{ route('mapels.index') }}"> --}}
                        {{-- <span class="hidden sm:block mx-16">Mapel</span> --}}
                        {{-- </a> --}}
                    </li>
                </div>
            </ul>
        </div>
    </div>
</body>

</html>
