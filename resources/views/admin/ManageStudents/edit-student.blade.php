<x-app-layout>
    <div class="card w-full bg-base-100 shadow-xl my-4">
        <h1 class="p-4 text-3xl font-bold">EDIT AKUN MURID</h1>
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
            <form action="/students/{{$students->nis}}" method="POST" class="flex flex-col">
                @csrf
                @method('PUT')

                <label class="input input-bordered flex items-center gap-2">
                    Name
                    <input value="{{ $students->name}}" name="name" type="text" class="grow" autofocus />
                </label>


                <label class="input input-bordered flex items-center gap-2">
                    Grade
                    <select name="grade" class="grow">
                        <option value="X" {{ old('grade', $students->grade) == 'X' ? 'selected' : '' }}>X</option>
                        <option value="XI" {{ old('grade', $students->grade) == 'XI' ? 'selected' : '' }}>XI</option>
                        <option value="XII" {{ old('grade', $students->grade) == 'XII' ? 'selected' : '' }}>XII</option>
                    </select>
                </label>

                <label class="input input-bordered flex items-center gap-2">
                    Gender
                    <select name="gender" class="grow">
                        <option value="L" {{ old('gender', $students->gender)}}>L</option>
                        <option value="P" {{ old('gender', $students->gender)}}>P</option>
                    </select>
                </label>

                <label class="input input-bordered flex items-center gap-2">
                    Email
                    <input value="{{ $students->email}}" name="email" type="email" class="grow" />
                </label>


                <div class="justify-center my-2">
                    <a class="btn btn-block my-2" href="{{route('students.index')}}">Cancel</a>
                    <button type="submit" class="btn btn-block btn-primary my-2">SUBMIT</button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
