<x-app-layout>
    <a class="btn sm:btn-wide" href="{{route('admin.dashboard')}}">Back to dashboard</a>
    <a class="btn sm:btn-wide btn-primary float-end text-xl" href="#">ADD</a>
    <div class="container bg-white overflow-auto rounded-lg m-4">
        <table class="table table-zebra my-4">
            <!-- head -->
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Ujian</th>
                    <th>Jumlah Soal</th>
                    <th>Action</th>
                </tr>
            </thead> <!--END thead-->
            <tbody>
                {{-- looping row --}}
                @foreach ($data as $quizes)
                <tr>
                    <th>{{$loop->iteration}}</th>
                    <td>{{$quizes->quiz->title}}</td>
                    <td>{{$quizes->quiz->count()}}</td>
                    <td class="flex gap-2">
                        <a class="btn btn-warning text-md my-1" href="#">Edit</a>
                        <!-- Open the modal using ID.showModal() method -->
                                <form action="#" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" class="btn btn-error text-md my-1 " value="Delete">
                                </form>
                        <a class="btn border-t-indigo-400 text-md my-1" href="#">Manage Soal</a>
                    </td>
                </tr>
                @endforeach
            </tbody> <!--END tbody-->
        </table>
    </div>
</x-app-layout>
