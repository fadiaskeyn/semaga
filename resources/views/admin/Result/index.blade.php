<x-app-layout>
    <a class="btn sm:btn-wide" href="{{route('admin.dashboard')}}">Back to dashboard</a>
    <a class="btn sm:btn-wide btn-primary float-end text-xl" href="{{route('mapels.create')}}">ADD</a>
    <div class="container bg-white overflow-auto rounded-lg m-4">
        <table class="table table-xs table-zebra">
            <!-- head -->
            <thead class="bg-secondary">
                <tr>
                    <th class="text-cyan-50">#</th>
                    <th class="text-cyan-50">nis</th>
                    <th class="text-cyan-50">Name</th>
                    <th class="text-cyan-50">grade</th>
                    <th class="text-cyan-50">gender</th>
                    <th class="text-cyan-50">email</th>
                    <th class="text-cyan-50">Action</th>
                </tr>
            </thead> <!--END thead-->
            <tbody>
                {{-- looping row --}}
                @foreach ($students as $student)
                <!-- Alternate row color based on odd/even index -->
                <tr class="{{ $loop->iteration % 2 === 0 ? 'bg-white' : 'bg-rgba-145-200-228-02' }}">
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
</x-app-layout>

