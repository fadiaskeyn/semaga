<x-app-layout>
    @section('breadcrumbs')
    {{ Breadcrumbs::render('BuatBankSoal') }}
    @endsection

    <div class="grid h-screen">
        <div @class(['bg-white', ])>

            {{-- <form action="{{ route('bank.store') }}" method="POST" class="bg-white p-8 rounded-lg shadow-md">
            @csrf --}}
            <div class="mb-6">
                <div class="flex items-center mb-4">
                    <h2 class="text-xl font-bold mr-4 text-primary">Soal 1</h2>
                    <div class="flex items-center">
                        <input type="radio" id="pg" name="jenis_soal" value="pilihan_ganda" checked class="mr-2">
                        <label for="pg" class="mr-4 text-primary">Pilihan Ganda</label>
                        <input type="radio" id="uraian" name="jenis_soal" value="uraian" class="mr-2">
                        <label for="uraian" class="text-primary">Uraian</label>
                    </div>
                </div>
                <div>
                    <textarea class="w-full h-40 p-2 border rounded text-primary" placeholder="Tulis soal di sini..."></textarea>
                </div>
            </div>

            <div class="mb-6">
                <h3 class="text-lg font-bold mb-2 text-primary">Opsi Jawaban</h3>
                <div class="space-y-2">
                    @foreach(['A', 'B', 'C', 'D', 'E'] as $option)
                    <div class="flex items-center">
                        <input type="radio" name="jawaban_benar" value="{{ $option }}" class="mr-2">
                        <input type="text" name="opsi_{{ $option }}" class="w-full p-2 border rounded text-primary" placeholder="Jawaban {{ $option }}">
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="mb-4">
                <button type="button" class="w-full p-2 border-dashed border-2 rounded-lg text-blue-700">+ Tambah Soal</button>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 bg-blue-700 text-white rounded-lg">Simpan Bank Soal</button>
            </div>
            {{-- </form> --}}
        </div>
    </div>

</x-app-layout>
