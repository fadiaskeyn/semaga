<x-app-layout>
    @section('breadcrumbs')
    {{ Breadcrumbs::render('DataGuru') }}
    @endsection

    <div class="m-4">
        <h1 class="text-2xl text-primary font-bold">Data Guru SMA Negeri 3 Jember</h1>
        <div aria-label="cari-data" class="grid sm:grid-cols-2 gap-4 py-4">
            <form method="GET" action="{{ route('users.index') }}" class="input input-bordered flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70">
                    <path fill-rule="evenodd" d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z" clip-rule="evenodd" />
                </svg>
                <input type="text" name="search" class="grow" placeholder="Cari berdasarkan nip, nama" value="{{ request('search') }}" />
            </form>
            <div class="flex">
                <a class="mr-4 btn sm:btn sm:btn-outline btn-primary text-xl tooltip-bottom tooltip" data-tip="tambah data murid" href="{{route('users.create')}} ">+ Tambah</a>
            </div>
        </div>

        <div class="container bg-white overflow-auto rounded-lg">
            <table class="table table-xs table-zebra">
                <!-- head -->
                <thead>
                    <tr>
                        <th>id</th>
                        <th>nip</th>
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
                        <th>{{$user->nip}}</th>
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
    </div>
</x-app-layout>
