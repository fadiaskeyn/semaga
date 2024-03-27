<x-app-layout>
    <a class="btn sm:btn-wide" href="{{route('admin.dashboard')}}">Back to dashboard</a>
    <a class="btn sm:btn-wide btn-primary float-end text-xl" href="#TODO create user">ADD</a>
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
                        <a class="btn btn-warning text-md my-1" href="#">Edit</a>
                        <!-- Open the modal using ID.showModal() method -->
                        <button class="btn btn-error text-md my-1" onclick="my_modal_2.showModal()">Delete</button>
                        <dialog id="my_modal_2" class="modal">
                            <div class="modal-box">
                                <h3 class="font-bold text-4xl text-error">WARNING!</h3>
                                <p class="py-4">Are you sure want to delete this shit?</p>
                                {{-- <form action="{{route('user.destroy', $user->id)}}" method="POST"> --}}
                                {{-- @csrf --}}
                                {{-- @method('delete') --}}
                                {{-- <input type="submit" class="btn sm:btn-wide btn-error text-md my-1 " value="Delete"> --}}
                                {{-- </form> --}}
                                <form method="dialog">
                                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                </form>
                            </div>
                        </dialog>
                    </td>
                </tr>
                @endforeach
            </tbody> <!--END tbody-->
        </table>
    </div>
</x-app-layout>
