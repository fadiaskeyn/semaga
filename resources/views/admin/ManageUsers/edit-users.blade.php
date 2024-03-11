<x-app-layout>
    <div class="card w-full bg-base-100 shadow-xl my-4">
        <h1 class="p-4 text-3xl font-bold">ADD USER</h1>
        <div class="card-body">
            @if($errors->any())
            <div role="alert" class="alert alert-error">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="/users/{{$users->id}}" method="POST" class="flex flex-col">
                @csrf
                @method('PUT')
                <label class="input input-bordered flex items-center gap-2">
                    Name
                    <input value="{{ old('name', $users->name) }}" name="name" type="text" class="grow" autofocus />
                </label>
                <label class=" input input-bordered flex items-center gap-2">
                    Username
                    <input value="{{ old('username',$users->username) }}" name="username" placeholder="Enter new username" type="text" class="grow" />
                </label>

                <label class="input input-bordered flex items-center gap-2">
                    Email
                    <input value="{{ old ('email',$users->email) }}" name="email" type="email" class="grow" />
                </label>
                <label class="input input-bordered flex items-center gap-2">
                    Address
                    <input value="{{$users->address}}" name="address" type="text" placeholder="Enter Address" class="grow" />
                </label>
                <label class="input input-bordered flex items-center gap-2">
                    Role
                    <select name="role" class="grow">
                        <option value="user" {{ old('status', $users->role) == 'user' ? 'selected' : '' }}>user</option>
                        <option value="admin" {{ old('status', $users->role) == 'inactive' ? 'selected' : '' }}>admin</option>
                    </select>
                </label>
                <label class="input input-bordered flex items-center gap-2">
                    Status
                    <select name=" status" class="grow">
                        <option value="active" {{ old('status', $users->status) == 'active' ? 'selected' : '' }}>active</option>
                        <option value="inactive" {{ old('status', $users->status) == 'inactive' ? 'selected' : '' }}>inactive</option>
                    </select>
                </label>
                <div class="justify-center my-2">
                    <a class="btn btn-block my-2" href="{{route('user.index')}}">Cancel</a>
                    <button type="submit" class="btn btn-block btn-primary my-2">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
