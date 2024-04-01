<x-app-layout>
    <a class="btn sm:btn-wide" href="{{route('admin.dashboard')}}">Back to dashboard</a>
    <a class="btn sm:btn-wide btn-primary float-end text-xl" href="{{route('students.create')}}">ADD</a>
    <div class="container bg-white overflow-auto rounded-lg m-4">
        <table class="table table-zebra my-4">
            <!-- head -->
            <thead>
                <tr>
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
                    <th>{{$student->nis}}</th>
                    <td>{{$student->name}}</td>
                    <td>{{$student->grade}}</td>
                    <td>{{$student->gender}}</td>
                    <td>{{$student->email}}</td>
                    <td class="flex gap-2">
                        <a class="btn btn-warning text-md my-1" href="/students/{{$student->nis}}/edit">Edit</a>
                        <!-- Open the modal using ID.showModal() method -->
                                <form action="{{route('students.destroy', $student->nis)}}" method="POST">
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
