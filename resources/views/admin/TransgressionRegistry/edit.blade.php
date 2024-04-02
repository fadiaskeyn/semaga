<x-app-layout>
    <div class="card w-full bg-base-100 shadow-xl my-4">
        <h1 class="p-4 text-3xl font-bold">EDIT PEELANGGARAN</h1>
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
            <form action="{{ route('transgressions.update', $data->id ) }}" method="POST" class="flex flex-col">
                @csrf
                @method('PUT')
                <label class="input input-bordered flex items-center gap-2">
                    Name
                    <input value="{{old('name',$data->name)}}" name="name" type="text" class="grow" autofocus />
                </label>
                <label class=" input input-bordered flex items-center gap-2">
                    Point
                    <input value="{{old('point',$data->point)}}" name="point" placeholder="Masukkan point baru" type="number" class="grow" />
                </label>

                <div class="justify-center my-2">
                    <a class="btn btn-block my-2" href="{{route('user.index')}}">Cancel</a>
                    <button type="submit" class="btn btn-block btn-primary my-2">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
