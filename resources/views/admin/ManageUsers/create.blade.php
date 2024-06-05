<x-app-layout>
    <div class="card w-full bg-base-100 shadow-xl my-4">
        <h1 class="p-4 text-3xl font-bold">TAMBAH AKUN GURU</h1>
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
            <form action="{{route('users.index')}}" method="POST" class="flex flex-col">
                @csrf
                <input required name="nip" type="text" placeholder="Enter nip" class="input input-bordered w-full my-2 sm:text-xl" autofocus/>
                <input required name="name" type="text" placeholder="Enter Full Name" class="input input-bordered w-full my-2 sm:text-xl"/>
                <input required name="username" type="text" placeholder="Enter Username" class="input input-bordered w-full my-2 sm:text-xl" />
                <input required name="email" type="email" placeholder="Enter Email" class="input input-bordered w-full my-2 sm:text-xl" />
                <input required name="password" type="password" placeholder="Enter Password at least 8 characters" class="input input-bordered w-full my-2 sm:text-xl" />
                <input required name="address" type="text" placeholder="Enter Address" class="input input-bordered w-full my-2 sm:text-xl" />
                <select name="role" class="select select-bordered w-full my-2 sm:text-xl">
                    <option selected class="sm:text-xl">user</option>
                    <option class="sm:text-xl">admin</option>
                </select>
                <div class="justify-center my-2">
                    <a class="btn btn-block my-2" href="{{route('users.index')}}">Cancel</a>
                    <button type="submit" class="btn btn-block btn-primary my-2">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
