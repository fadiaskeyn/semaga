<x-app-layout>
    <a class="btn sm:btn-wide" href="{{route('admin.dashboard')}}">Back to dashboard</a>
    <a class="btn sm:btn-wide btn-primary float-end text-xl" href="{{route('user.create')}}">ADD</a>
    <div class="container bg-white overflow-auto rounded-lg m-4">
        <table class="table table-zebra my-4">
            <!-- head -->
            <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead> <!--END thead-->
            <tbody>
                <!-- row 1 -->
                @foreach ($users as $user)
                <tr>
                    <th>{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    <td>{{$user->address}}</td>
                    <td class="flex gap-2">
                        <a class="btn btn-warning text-md my-1" href="/users/{{$user->id}}/edit">Edit</a>
                        <!-- Open the modal using ID.showModal() method -->
                        <form action="{{ route('user.destroy', $user->id ) }}" method="POST">
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
    {{$users->links()}}
</x-app-layout>
