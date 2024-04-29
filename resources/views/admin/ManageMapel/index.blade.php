<x-app-layout>
    <a class="btn sm:btn-wide" href="{{route('admin.dashboard')}}">Back to dashboard</a>
    <a class="btn sm:btn-wide btn-primary float-end text-xl" href="{{route('mapels.create')}}">ADD</a>
    <div class="container bg-white overflow-auto rounded-lg m-4">
        <table class="table table-zebra my-4">
            <!-- head -->
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Mapel</th>
                    <th>Action</th>
                </tr>
            </thead> <!--END thead-->
            <tbody>
                {{-- looping row --}}
                @foreach ($mapels as $mapel)
                <tr>
                    <th>{{$mapel->id}}</th>
                    <td>{{$mapel->mapel}}</td>
                    <td class="flex gap-2">
                        <a class="btn btn-warning text-md my-1" href="/mapels/{{$mapel->id}}/edit">Edit</a>
                        <!-- Open the modal using ID.showModal() method -->
                                <form action="{{route('mapels.destroy', $mapel->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" class="btn btn-error text-md my-1 " value="Delete">
                                </form>
                    </td>
                </tr>
                @endforeach
            </tbody> <!--END tbody-->
        </table>
    </div>
</x-app-layout>
