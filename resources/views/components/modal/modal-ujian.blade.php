<dialog id="my_modal_2" class="modal">
  <div class="modal-box">
    <form action="{{ route('ujian.create') }}" class="p-4 md:p-5" method="POST">
        @csrf
        <div class="grid gap-4 mb-4 grid-cols-2">
            <div class="col-span-2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
                <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukan Nama Ujian" required="">
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Durasi Ujian</label>
                <input type="number" name="duration" id="duration" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Satuan Menit" required="">
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mata Pelajaran</label>
                <select name="course" id="course" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option selected="">Pilih Mata Pelajaran</option>
                    <option value="inggris">Bahasa Inggris</option>
                    <option value="fisika">Fisika</option>
                </select>
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu Ujian</label>
                <input type="time" name="jam_ujian" id="jam_ujian" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="tanggal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Ujian</label>
                <input type="date" name="tanggal" id="tanggal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Pilih waktu ujian" required="">
            </div>

            <div class="col-span-2">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Description</label>
            </div>
        </div>
        <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
            Buat
        </button>
    </form>
  </div>
  <form method="dialog" class="modal-backdrop">
    <button>close</button>
  </form>
</dialog>
