<x-app-layout>
    @section('breadcrumbs')
    {{ Breadcrumbs::render('DataMurid') }}
    @endsection

    <a class="btn sm:btn-wide btn-primary float-end text-xl" href="{{route('students.create')}}">Tambah</a>
    <div class="container bg-white overflow-auto rounded-lg m-4">
        <table class="table table-zebra my-4">
            <!-- head -->
            <thead>
                <tr>
                    <th>#</th>
                    <th>nis</th>
                    <th>Name</th>
                    <th>grade</th>
                    <th>gender</th>
                    <th>email</th>
                    <th>Action</th>
                </tr>
            </thead> <!--END thead-->
            <tbody>
                {{-- looping row --}}
                @foreach ($students as $student)
                <tr>
                    <th>{{$student->id}}</th>
                    <td>{{$student->nis}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->grade}}</td>
                    <td>{{$student->gender}}</td>
                    <td>{{$student->email}}</td>
                    <td class="flex gap-2">
                        <a class="btn btn-warning text-md my-1" href="{{route( 'students.edit',$student->id )}}">Edit</a>
                        <!-- Open the modal using ID.showModal() method -->
                        <form action="{{route('students.destroy', $student->id)}}" method="POST">
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
    {{$students->links()}}
    <a class="btn sm:btn-wide" href="{{route('admin.dashboard')}}">Kembali ke beranda</a>
</x-app-layout>
