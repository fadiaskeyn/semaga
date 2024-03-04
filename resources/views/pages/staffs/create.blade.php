<x-app-layout>
    <div class="p-20 bg-base-200 rounded-b-xl
        lg:flex ">
        <div class="flex mx-auto bg-base-100 rounded-xl p-4 mb-4
            md:mr-4
            lg:mb-0
            lg:w-1/2
            ">
            <h1 class="sm:text-xl">TAMBAH DATA STAFF</h1>
        </div>
        <div class="bg-base-100 p-4 rounded-lg">
            <form action="{{route('pages.staffs.store')}}" method="POST">
                @csrf

                <div class="mb-2">
                    <label for="nip">NIP:</label>
                    <input type="text" pid="nip" name="nip" placeholder="E4122113" required class="input input-bordered input-primary w-full"/>
                </div>

                <div class="mb-2">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" placeholder="Dimas Fajar Kurniawan" required class="input input-bordered input-primary w-full "/>
                </div>

                <div class="mb-2">
                    <label for="role">Role:</label>
                    <select id="role" name="role" required
                        class="select select-primary w-full "
                    >
                        <option value="0" selected>User</option>
                        <option value="1">Admin</option>
                    </select>
                </div>

                <div class="mb-2">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="example@gmail.com" class="input input-bordered input-primary w-full " />
                </div>

                <a href="{{route('pages.staffs.index')}}"
                    class="btn btn-active"
                > Cancel
                </a>
                <button
                    type="submit"
                    class="btn lg:btn-wide btn-primary"
                >Submit</button>
            </form>
        </div>
    </div>

</x-app-layout>
