<x-app-layout>
    <section class="section">
        <div class="section-body">
    <div class="container bg-white overflow-auto rounded-lg m-4">
    </div>

<div class="relative flex flex-col w-full h-full text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
    <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white rounded-none bg-clip-border">
      <div class="flex items-center justify-between gap-8 mb-8">
        <div>
          <h5
            class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
            Data Ujian
          </h5>
          <p class="block mt-1 font-sans text-base antialiased font-normal leading-relaxed text-gray-700">
          </p>
        </div>
        <div class="flex flex-col gap-2 shrink-0 sm:flex-row">
          <button class="flex select-none items-center gap-3 rounded-lg bg-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
            type="button" id="mapel" onclick="my_modal_2.showModal()">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
              stroke-width="2" class="w-4 h-4">
              <path
                d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z">
              </path>
            </svg>
            Buat Ujian Baru
          </button>
        </div>
      </div>
      <div class="flex flex-col items-center justify-between gap-4 md:flex-row">
        <div class="block w-full overflow-hidden md:w-max">
        </div>
        <div class="w-full md:w-72">
          <div class="relative h-10 w-full min-w-[200px]">
            <div class="absolute grid w-5 h-5 top-2/4 right-3 -translate-y-2/4 place-items-center text-blue-gray-500">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" aria-hidden="true" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
              </svg>
            </div>
            <input
              class="peer h-full w-full rounded-[7px] border border-blue-gray-200 border-t-transparent bg-transparent px-3 py-2.5 !pr-9 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-gray-900 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
              placeholder=" " />
            <label
              class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:!border-gray-900 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:!border-gray-900 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
              Search
            </label>
          </div>
        </div>
      </div>
    </div>
    <!-- component -->
    {{--  <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">  --}}
      <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
        <thead class="bg-gray-50">
          <tr>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Judul</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Mata Pelajaran</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Tanggal</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Durasi</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Status</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Action</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
            @foreach($data as $quiz)
            <tr class="hover:bg-gray-50">
                <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                    {{ $quiz->title }}
                </th>
                <td class="px-6 py-4">
                    {{ $quiz->course }}
                </td>

                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($quiz->quiz_date)->locale('id')->translatedFormat('l, j F Y') }}</td>
                <td class="px-6 py-4">
                    <div class="flex gap-2">
                        <span class="inline-flex items-center gap-1 rounded-full bg-violet-50 px-2 py-1 text-xs font-semibold text-violet-600">
                            {{ $durasis[$loop->index] }}
                        </span>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="flex gap-2">
                            <span class="inline-flex items-center gap-1 rounded-full
                            @if($quiz->status == 'off') bg-red-50 text-red-600 @else bg-green-50 text-green-600 @endif
                            px-2 py-1 text-xs font-semibold">
                                <span class="h-3 w-3 rounded-full
                                @if($quiz->status == 'off') bg-red-600 @else bg-green-600 @endif">
                                </span>
                                {{ $quiz->status }}
                            </span>
                    </div>
                </td>
            <td class="px-6 py-4">
              <div class="flex justify-start gap-4">
                <a x-data="{ tooltip: 'Delete' }" href="/ujian/delete/{{ $quiz->id }}">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="h-6 w-6"
                    x-tooltip="tooltip"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                    />
                  </svg>
                </a>
                <a x-data="{ tooltip: 'Edit' }"
                href="#"
                @mouseover="tooltip = 'Edit'"
                @mouseout="tooltip = 'Edit'"
                @click="my_modal_3.showModal()"
                class="cursor-pointer">
                 <svg xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke-width="1.5"
                      stroke="currentColor"
                      class="h-6 w-6"
                      x-tooltip="tooltip">
                     <path stroke-linecap="round"
                           stroke-linejoin="round"
                           d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"/>
                 </svg>
             </a>
              </div>
            </td>
          </tr>
      @endforeach
        </tbody>
      </table>
    <div class="flex items-center justify-between p-4 border-t border-blue-gray-50">
      <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
        Page 1 of 10
      </p>
      <div class="flex gap-2">
        <button
          class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
          type="button">
          Previous
        </button>
        <button
          class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
          type="button">
          Next
        </button>
      </div>
    </div>
  </div>
</x-app-layout>
</section>
@include('components.modal.modal-ujian')
@include('components.modal.modal-ujian-edit')
@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mengambil elemen input "Nama Pasien"
        var inputPasien = document.getElementById('mapel');

        // Menambahkan event listener untuk menanggapi klik pada input
        inputPasien.addEventListener('click', function() {
            // Memunculkan modal dengan ID "form-simpan"
            $('#form-tambah').modal('show');
        });

        const button = document.getElementById('mapel');
        const modal = document.getElementById('modal');

        // Tambahkan event listener ke tombol
        button.addEventListener('click', function() {
            // Tampilkan modal saat tombol diklik
            modal.classList.remove('hidden');
        });

        // Fungsi untuk menyembunyikan modal
        function hideModal() {
            modal.classList.add('hidden');
        }

        // Sembunyikan modal saat klik di luar modal
        window.addEventListener('click', function(event) {
            if (event.target === modal) {
                hideModal();
            }
        });

        // Sembunyikan modal saat tombol escape ditekan
        window.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                hideModal();
            }
        });
    });

</script>

<script>
    function updateStatus(id) {
        // Kirim permintaan AJAX
        fetch('/ujian/set/' + id, {
            method: 'POST', // Atur metode HTTP yang sesuai
            headers: {
                'Content-Type': 'application/json',
                // Anda mungkin perlu menambahkan header lain, seperti authorization token
            },
            body: JSON.stringify({
                // Anda bisa melewatkan data tambahan jika dibutuhkan
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Ada masalah saat mengubah status');
            }
            return response.json();
        })
        .then(data => {
            // Manipulasi tampilan tombol sesuai respons dari server
            const button = document.getElementById('quizButton' + id);
            const statusSpan = button.querySelector('.font-semibold');
            const dot = button.querySelector('.rounded-full');

            // Ubah warna dan teks berdasarkan status yang diterima dari server
            if (data.status === 'on') {
                button.classList.remove('bg-red-50', 'text-red-600');
                button.classList.add('bg-green-50', 'text-green-600');
                dot.classList.remove('bg-red-600');
                dot.classList.add('bg-green-600');
            } else {
                button.classList.remove('bg-green-50', 'text-green-600');
                button.classList.add('bg-red-50', 'text-red-600');
                dot.classList.remove('bg-green-600');
                dot.classList.add('bg-red-600');
            }

            statusSpan.textContent = data.status;
        })
        .catch(error => {
            console.error('Ada masalah:', error);
            // Tambahkan logika penanganan kesalahan di sini jika dibutuhkan
        });
    }
</script>

@endpush

