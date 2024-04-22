<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>DASHBOARD ADMIN</h1>
                    <aside class=" flex gap-2 mt-1 flex-col md:flex-row ">
                        <a class="btn" href="{{route('user.index')}}">manajemen guru</a>
                        <a class="btn" href="{{route('mapels.index')}}">manajemen mata pelajaran</a>
                        <a class="btn" href="#">manajemen kelas</a>
                        <a class="btn" href="{{route('students.index')}}">manajemen siswa</a>
                        <a class="btn" href="{{route('transgressions.index')}}">mengelola pelanggaran</a>
                    </aside>
                    <br>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
