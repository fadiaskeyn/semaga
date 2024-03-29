<x-app-layout>
    <div class="card w-full bg-base-100 shadow-xl my-4">
        <h1 class="p-4 text-3xl font-bold">Tambah Siswa</h1>
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
            <form action="{{route('students.index')}}" method="POST" class="flex flex-col">
                @csrf
                <input required value="{{old('nis')}}" name="nis" type="text" placeholder="Masukkan Nis | maksimal 15 digit" class="input input-bordered w-full my-2 sm:text-xl" autofocus />
                <input required value="{{old('name')}}" name="name" type="text" placeholder="Masukan Nama Lengkap" class="input input-bordered w-full my-2 sm:text-xl" />
                <select name="grade" class="select select-bordered w-full my-2 sm:text-xl">
                    <option value="X {{old('grade')}}" selected class="sm:text-xl">X</option>
                    <option value="XI {{old('grade')}}" class="sm:text-xl">XI</option>
                    <option value="XII {{old('grade')}}" class="sm:text-xl">XII</option>
                </select>
                <select name="gender" class="select select-bordered w-full my-2 sm:text-xl">
                    <option value="L {{old('gender')}}" selected class="sm:text-xl">L</option>
                    <option value="P {{old('gender')}}" class="sm:text-xl">P</option>
                </select>
                <input required value="{{old('password')}}" name="password" type="password" placeholder="Masukkan Password | Minimal 8 karakter [A-Z-0-9]" class="input input-bordered w-full my-2 sm:text-xl" />
                <input required value="{{old('email')}}" name="email" type="text" placeholder="Masukkan email contoh@gmail.com" class="input input-bordered w-full my-2 sm:text-xl" />
                <div class="justify-center my-2">
                    <a class="btn btn-block my-2" href="{{route('students.index')}}">Cancel</a>
                    <button type="submit" class="btn btn-block btn-primary my-2">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
