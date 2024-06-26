<x-app-layout>
    <a class="btn sm:btn-wide" href="{{route('admin.dashboard')}}">Back to dashboard</a>
    <a class="btn sm:btn-wide btn-primary float-end text-xl" href="{{route('mapels.create')}}">ADD</a>
    <div class="container bg-white overflow-auto rounded-lg m-4">
        <table class="table table-xs table-zebra">
            <!-- head -->
            <thead class="bg-secondary">
                <tr>
                    <th class="text-cyan-50">No</th>
                    <th class="text-cyan-50">Nama Ujian</th>
                    <th class="text-cyan-50">Jumlah Murid Mengikuti Ujian</th>
                    <th class="text-cyan-50"> Tanggal ujian </th>
                    <th class="text-cyan-50">Action</th>
                </tr>
            </thead> <!--END thead-->
            <tbody>
                {{-- looping row --}}
                @foreach ($result as $ress)
                <!-- Alternate row color based on odd/even index -->
                <tr class="{{ $loop->iteration % 2 === 0 ? 'bg-white' : 'bg-rgba-145-200-228-02' }}">
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $ress->quiz->title }}</td>
                    {{--  <td>{{ $ress->student->nis }}</td>  --}}
                    <td>{{ $ress->quiz->count() }}</td>
                    <td>{{ Carbon\Carbon::parse($ress->quiz->quiz_date)->translatedFormat('l, d F Y') }}</td>
                    <td class="flex gap-2">
                        <a class="btn btn-warning text-md my-1" href="#">Edit</a>
                        <!-- Open the modal using ID.showModal() method -->
                        <form action="#" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="submit" class="btn btn-error text-md my-1 " value="Delete">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody> <!--END tbody-->
        </table>
    </div>
</x-app-layout>

