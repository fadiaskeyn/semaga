<x-app-layout>
    {{-- Layout --}}
    <div class="grid md:grid-cols-3 gap-2">
        <div class="grid md:flex md:flex-col gap-2 md:col-span-2">
            {{-- PROFILE --}}
            <div class="bg-white rounded-lg">
                <h2 class="font-semibold text-xl text-primary px-4 py-2">Profile</h2>
                <div class="px-4 py-2 flex gap-2 items-center md:h-16">
                    <img class="w-11 h-11" src="{{ asset('icons/group.png') }}" />
                    <div class="flex flex-col text-primary">
                        <span class="font-semibold text-xl">{{Auth::user()->name}}</span>
                        <span class="inline-flex gap-1 items-center">
                            <img class="w-4 h-4" src="{{ asset('icons/office-worker.png') }}" />
                            NIP. {{ Auth::user()->id}}</span>
                    </div>
                </div>
            </div>
            {{-- STATISTIK --}}
            <div class="bg-white rounded-lg">
                <h2 class="font-semibold text-xl text-primary px-4 py-2">STATISTIK</h2>
                <div class="flex justify-center md:flex-wrap md:gap-12">
                    <div class="m-4 p-2 h-10 md:w-40 md:h-40 rounded-xl bg-gradient-to-tl from-cyan-500 to-secondary">
                        <div class="flex gap-2 md:flex-col md:gap-3 text-white">
                            <img class="hidden md:block w-[30px]" src="{{ asset('icons/graduation-cap.png') }}" alt="student" />
                            <span class="font-semibold md:text-3xl">{{ $totalMurid }}</span>
                            <span class="font-medium md:text-2xl">Siswa</span>
                        </div>
                    </div>
                    <div class="m-4 p-2 md:w-40 md:h-40 rounded-xl bg-gradient-to-tl from-cyan-500 to-secondary">
                        <div class="flex gap-2 md:flex-col md:gap-3 text-white">
                            <img class="hidden md:block w-[25px]" src="{{ asset('icons/class-lesson.png') }}" alt="teacher" />
                            <span class="font-semibold md:text-3xl">{{ $totalUsers }}</span>
                            <span class="font-medium md:text-2xl">Guru</span>
                        </div>
                    </div>
                    <div class="m-4 p-2 md:w-40 md:h-40 rounded-xl bg-gradient-to-tl from-cyan-500 to-secondary">
                        <div class="flex gap-2 md:flex-col md:gap-3 text-white">
                            <img class="hidden md:block w-[20px]" src="{{ asset('icons/dictionary-language-book.png') }}" alt="dictionary" />
                            <span class="font-semibold md:text-3xl">???</span>
                            <span class="font-medium md:text-2xl">Bank Soal</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid gap-2 md:mt-0">
            {{-- UJIAN BERLANGSUNG--}}
            <div class="bg-white rounded-lg">
                <h2 class="font-semibold text-xl text-primary p-4">UJIAN SEDANG BERLANGSUNG</h2>

                <div class="h-48 overflow-x-auto m-2">

                    <div class="inline-flex items-center gap-2 p-2">
                        <img class="w-7 h-8" src="{{ asset('icons/ujian.png') }}" alt="" />
                        <div class="flex-col">
                            <h2 class="text-primary">1</h2>
                            <span class="text-primary">Kelas XII -
                                <span class="text-black">08.00-11.00</span>
                            </span>
                        </div>
                    </div>
                    <div class="inline-flex items-center gap-2 p-2">
                        <img class="w-7 h-8" src="{{ asset('icons/ujian.png') }}" alt="" />
                        <div class="flex-col">
                            <h2 class="text-primary">2</h2>
                            <span class="text-primary">Kelas XII -
                                <span class="text-black">08.00-11.00</span>
                            </span>
                        </div>
                    </div>
                    <div class="inline-flex items-center gap-2 p-2">
                        <img class="w-7 h-8" src="{{ asset('icons/ujian.png') }}" alt="" />
                        <div class="flex-col">
                            <h2 class="text-primary">3</h2>
                            <span class="text-primary">Kelas XII -
                                <span class="text-black">08.00-11.00</span>
                            </span>
                        </div>
                    </div>
                    <div class="inline-flex items-center gap-2 p-2">
                        <img class="w-7 h-8" src="{{ asset('icons/ujian.png') }}" alt="" />
                        <div class="flex-col">
                            <h2 class="text-primary">Ujian Akhir Semester II</h2>
                            <span class="text-primary">Kelas XII -
                                <span class="text-black">08.00-11.00</span>
                            </span>
                        </div>
                    </div>
                    <div class="inline-flex items-center gap-2 p-2">
                        <img class="w-7 h-8" src="{{ asset('icons/ujian.png') }}" alt="" />
                        <div class="flex-col">
                            <h2 class="text-primary">Ujian Akhir Semester II</h2>
                            <span class="text-primary">Kelas XII -
                                <span class="text-black">08.00-11.00</span>
                            </span>
                        </div>
                    </div>

                </div>

                <div class="flex justify-center border-t border-t-base-300 mx-6">
                    <a class="text-primary p-2" href="">Buka di Pantau Ujian</a>
                </div>
            </div>

            {{-- RIWAYAT UJIAN --}}
            <div class="bg-white rounded-lg">
                <div class="flex justify-between">
                    <h2 class="font-semibold text-xl text-primary p-4">RIWAYAT UJIAN</h2>
                    <div class="inline-flex gap-2 p-4">
                        <img class="w-6 h-6" src="{{ asset('icons/blank-calendar.png') }}" />
                        <span class="text-primary">Bulan ini</span>
                    </div>
                </div>
                <div class="h-48 overflow-x-auto m-2">

                    <div class="inline-flex items-center gap-2 p-2">
                        <img class="w-7 h-8" src="{{ asset('icons/ujian.png') }}" alt="" />
                        <div class="flex-col">
                            <h2 class="text-primary">1</h2>
                            <span class="text-primary">Kelas XI 5 -
                                <span class="text-black">11 Januari 2024</span>
                            </span>
                        </div>
                    </div>
                    <div class="inline-flex items-center gap-2 p-2">
                        <img class="w-7 h-8" src="{{ asset('icons/ujian.png') }}" alt="" />
                        <div class="flex-col">
                            <h2 class="text-primary">2</h2>
                            <span class="text-primary">Kelas XI 5 -
                                <span class="text-black">11 Januari 2024</span>
                            </span>
                        </div>
                    </div>
                    <div class="inline-flex items-center gap-2 p-2">
                        <img class="w-7 h-8" src="{{ asset('icons/ujian.png') }}" alt="" />
                        <div class="flex-col">
                            <h2 class="text-primary">3</h2>
                            <span class="text-primary">Kelas XI 5 -
                                <span class="text-black">11 Januari 2024</span>
                            </span>
                        </div>
                    </div>
                    <div class="inline-flex items-center gap-2 p-2">
                        <img class="w-7 h-8" src="{{ asset('icons/ujian.png') }}" alt="" />
                        <div class="flex-col">
                            <h2 class="text-primary">Ulangan Harian 11 Peluang</h2>
                            <span class="text-primary">Kelas XI 5 -
                                <span class="text-black">11 Januari 2024</span>
                            </span>
                        </div>
                    </div>

                </div>
                <div class="flex justify-center border-t border-t-base-300 mx-6">
                    <a class="text-primary p-2" href="">Buka di Ujian</a>
                </div>
            </div>
            {{-- ... --}}
        </div>
    </div>
</x-app-layout>
