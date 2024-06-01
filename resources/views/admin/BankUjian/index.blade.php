<x-app-layout>
    @section('breadcrumbs')
    {{ Breadcrumbs::render('BankSoal') }}
    @endsection

    <a class="btn btn-primary text-xl" href="{{route('banks.create')}}">Tambah</a>
    <div>
        disini harus nya ada tabel
    </div>

</x-app-layout>
