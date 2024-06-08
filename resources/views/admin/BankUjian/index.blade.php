<x-app-layout>
    @section('breadcrumbs')
    {{ Breadcrumbs::render('BankSoal') }}
    @endsection

    <div class="m-4">
        <h1 class="text-2xl text-primary font-bold">Bank Soal</h1>
        <div aria-label="cari-data" class="grid sm:grid-cols-2 gap-4 py-4">
            <label class="input input-bordered flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70"><path fill-rule="evenodd" d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z" clip-rule="evenodd" /></svg>
                <input type="text" class="grow" placeholder="Cari berdasarkan nis, nama" />
            </label>
            <div class="flex">
                <a class="mr-4 btn sm:btn sm:btn-outline btn-primary text-xl tooltip-bottom tooltip" data-tip="buat soal baru" href="{{route('banks.create')}} ">+ Tambah</a>
                <select class="select select-bordered w-full max-w-xs">
                    <option disabled selected>Filter berdasarkan kelas</option>
                    <option>X 1</option>
                    <option>XI 5</option>
                    <option>XII 3</option>
                </select>
            </div>
        </div>

        <div class="container bg-white overflow-auto rounded-lg">
            <table class="table table-xs table-zebra">
                <!-- head -->
                <thead>
                    <tr>
                        <th>Kode Soal</th>
                        <th>Pertanyaan</th>
                        <th>Kunci Jawaban</th>
                        <th>Bobot</th>
                        <th class="flex justify-end">Action</th>
                    </tr>
                </thead> <!--END thead-->
                <tbody class="justify-center">
                    {{-- looping row --}}
                    @foreach ($data as $question)
                        <tr>
                            <th>{{$question->id}}</th>
                            <td name="soalfinal">{!! $question->question !!}</td>
                            <td>{{$question->correct_answer}}</td>
                            <td>{{ intval($question->score) }}</td>
                            <td>{{$question->created_by}}</td>
                            <td class="flex">
                                <a class="btn btn-warning text-md my-1" href="#">Edit</a>
                                <!-- Open the modal using ID.showModal() method -->
                                <form action="{{ route('question.delete',$question->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" class="btn btn-error text-md my-1 " value="Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                                 <!--END tbody-->
            </table>
        </div>
    </div>

</x-app-layout>
