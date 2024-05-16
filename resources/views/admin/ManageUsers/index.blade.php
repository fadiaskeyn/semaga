<x-app-layout>
    @section('breadcrumbs')
    {{ Breadcrumbs::render('DataGuru') }}
    @endsection

    <a class="btn sm:btn-wide btn-primary float-end text-xl" href="{{route('users.create')}}">Tambah</a>
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
                        <a class="btn btn-warning text-md my-1" href="{{ route('users.edit', $user->id) }}">Edit</a>
                        <!-- Open the modal using ID.showModal() method -->
                        <form action="{{ route('users.destroy', $user->id ) }}" method="POST">
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
    <a class="btn sm:btn-wide" href="{{route('admin.dashboard')}}">Kembali ke beranda</a>
</x-app-layout>
