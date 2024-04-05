<x-app-layout>
    <div class="card w-full bg-base-100 shadow-xl my-4">
        <h1 class="p-4 text-3xl font-bold">Tambah Mapel</h1>
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
            <form action="{{route('mapels.index')}}" method="POST" class="flex flex-col">
                @csrf
                <input required value="{{old('mapel')}}" name="mapel" type="text" placeholder="Masukkan nama mapel yang baru" class="input input-bordered w-full my-2 sm:text-xl" />
                <div class="justify-center my-2">
                    <a class="btn btn-block my-2" href="{{route('mapels.index')}}">Cancel</a>
                    <button type="submit" class="btn btn-block btn-primary my-2">SUBMIT</button>
                </div>
            </form>      
        </div>
    </div>
</x-app-layout>
