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
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script> --}}
    <script src="https://kit.fontawesome.com/f15ba4ed30.js" crossorigin="anonymous"></script>
    <script src="https://editor.codecogs.com/eqneditor.api.min.js"></script>
    <link rel="stylesheet" href="https://editor.codecogs.com/eqneditor.css" />
    <script>
        window.onload = function() {
            textarea = EqEditor.TextArea.link('latexInput')
                .addOutput(new EqEditor.Output('output'))
                .addHistoryMenu(new EqEditor.History('history'));

            EqEditor.Toolbar.link('toolbar').addTextArea(textarea);
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>

    <!-- Scripts -->
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
        <div class="drawer-side drawer-open shadow-lg">
            <label for="my-drawer-3" aria-label="close sidebar" class="drawer-overlay"></label>
            <ul class="menu p-4 w-40 sm:w-80 min-h-full bg-secondary text-white">
                <!-- Sidebar content here -->
                <div class="flex sm:border-b items-center p-2 mb-2">
                    <img class="w-9 h-9" src="{{ asset('icons/small-logo.jpg') }}" alt="logo">
                    <label class="font-bold text-sm w-36 m-2 hidden sm:block">SISTEM UJIAN SMAN 3 JEMBER</label>
                </div>
                <div>
                    <li class="bg-primary sm:bg-secondary text-white my-2">
                        <a class="my-2" href="{{ route('admin.dashboard')}}">
                            <img class="hidden sm:block w-7 h-7" src="{{ asset('icons/dashboard.png') }}" alt="">
                            <span class="block">Dashboard</span>
                        </a>
                    </li>
                    <li class="bg-primary sm:bg-secondary text-white my-2">
                        <a class="my-2 border-b-2 sm:border-none">
                            <img class="hidden sm:block w-7 h-7" src="{{ asset('icons/Groups.png') }}" alt="">
                            <span class="block text-gray-700 sm:text-white">Data</span>
                        </a>
                        <a class="my-2" href="{{route('students.index')}}">
                            <span class="block sm:mx-16">Murid</span>
                        </a>
                        <a class="my-2" href="{{ route('users.index') }}">
                            <span class="block sm:mx-16">Guru</span>
                        </a>
                    </li>
                    <li class="bg-primary sm:bg-secondary text-white my-2">
                        <a class="my-2 border-b-2 sm:border-none">
                            <img class="hidden sm:block w-7 h-7" src="{{ asset('icons/books.png') }}" alt="">
                            <span class="block text-gray-700 sm:text-white">Ujian</span>
                        </a>
                        <a class="my-2" href="{{route('banks.index')}}">
                            <span class="block sm:mx-16">Bank Soal</span>
                        </a>
                        <a class="my-2" href="{{route('ujian.index')}}">
                            <span class="block sm:mx-16">Penjadwalan</span>
                        </a>
                        <a class="my-2" href="#">
                            <span class="block sm:mx-16">Riwayat Ujian</span>
                        </a>
                    </li>
                </div>
            </ul>
        </div>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor-container'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.editor-container').forEach(function(container, index) {
                ClassicEditor
                    .create(container)
                    .then(editor => {
                        console.log('Editor initialized for container', index, editor);
                    })
                    .catch(error => {
                        console.error('Error initializing editor for container', index, error);
                    });
            });
        });
    </script>
</body>

</html>
