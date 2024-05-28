<x-app-layout>
    @section('breadcrumbs')
    {{ Breadcrumbs::render('BankSoal') }}
    @endsection

    <div class="grid h-screen">
        <div @class(['bg-white', ])>
            {{-- HEADING --}}
            <h @class(['font-bold' , 'text-2xl' , 'p-4' , 'text-primary' , 'block' ])> Bank Soal </h>

            <div @class(['grid' ,'md:flex', 'grid-cols-2' ])>
                <div class="flex flex-col w-44 justify-center items-center m-4 p-2 rounded-xl bg-gradient-to-tl from-cyan-500 to-secondary">
                    <span @class(['text-4xl', 'font-semibold' , 'text-white' ])>30</span>
                    <span @class(['text-2xl', 'text-white' ])>Pilihan Ganda</span>
                    <span @class(['text-4xl', 'font-semibold' , 'text-white' ])>5</span>
                    <span @class(['text-2xl', 'text-white' ])>Uraian</span>
                </div>

                <div class="flex flex-col w-44 justify-center items-center m-4 p-2 rounded-xl bg-gradient-to-tl from-cyan-500 to-secondary">
                    <span @class(['text-4xl', 'font-semibold' , 'text-white' ])>30</span>
                    <span @class(['text-2xl', 'text-white' ])>Pilihan Ganda</span>
                </div>

                <div class="flex flex-col w-44 justify-center items-center m-4 p-2 rounded-xl bg-gradient-to-tl from-cyan-500 to-secondary">
                    <span @class(['text-4xl', 'font-semibold' , 'text-white' ])>5</span>
                    <span @class(['text-2xl', 'text-white' ])>Uraian</span>
                </div>


                {{-- <div @class(['flex','flex-col','cursor-pointer','justify-center','items-center','w-44','gap-4','m-4','bg-white', 'rounded-xl' , 'border-4' , 'border-dashed' ,'border-primary'])>
                    <img class="md:block text-primary" src="{{ asset('icons/file_add.png') }}" alt="tambah ujian" />
                    <span @class(['text-sm','font-bold', 'text-primary' ,'hidden','md:block'])>Buat Bank Soal Baru</span>
                </div> --}}

                <div @class(['flex','flex-col','cursor-pointer','justify-center','items-center','w-44','gap-4','m-4','bg-white', 'rounded-xl' , 'border-4' , 'border-dashed' ,'border-primary'])>
                    <a href="{{ route('createBank') }}" class="flex flex-col justify-center items-center w-full h-full">
                        <img class="md:block text-primary" src="{{ asset('icons/file_add.png') }}" alt="tambah ujian" />
                        <span @class(['text-sm','font-bold', 'text-primary' ,'hidden','md:block'])>Buat Bank Soal Baru</span>
                    </a>
                </div>                


                <div @class(['flex','flex-col','cursor-pointer','justify-center','items-center','w-44','gap-4','m-4','bg-white', 'rounded-xl' , 'border-4' , 'border-dashed' ,'border-primary'])>
                    <img class="md:block text-primary" src="{{ asset('icons/file_add.png') }}" alt="tambah ujian" />
                    <span @class(['text-sm','font-bold', 'text-primary' ,'hidden','md:block'])>Buat Bank Soal Baru</span>
                </div>

            </div>
</x-app-layout>
