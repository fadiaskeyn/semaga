<x-app-layout>
    @section('breadcrumbs')
    {{ Breadcrumbs::render('BuatBankSoal') }}
    @endsection

    <dialog aria-label="dialog rumus" id="rumus_0" class="modal modal-top">
        <div class="modal-box">

            <div id="equation-editor">
                <div id="toolbar"></div>
                <div id="latexInput" placeholder="Tulis rumus disini"></div>
                <div id="equation-output">
                    <img id="output">
                </div>
            </div>

            <div class="modal-action">
                <form method="dialog">
                    <button class="btn">Close</button>
                </form>
            </div>
        </div>
    </dialog>

    <div aria-label="soal-container" class="md:grid gap-4">

        <div aria-label="soal-ke-x" class="bg-white rounded-xl px-4">
            <div class="flex items-center mt-5 text-primary gap-4">
                <label>soal ke - X </label>
                <input type="radio" name="jenis-ujian" class="radio" checked />Pilihan Ganda
                <input type="radio" name="jenis-ujian" class="radio" />Uraian
            </div>

            <h1>pertanyaan<span class="text-red-600">*</span></h1>

            <textarea aria-label="rumus" id="summernote"></textarea>

            <div class="grid items-center py-2 gap-4">
                <form>
                    <label class="label cursor-pointer gap-2">
                        <input type="radio" name="opsi-jawaban" class="radio " />
                        <span class="label-text">A</span>
                        <input required type="text" placeholder="Tulis Jawaban" class="input input-bordered w-full" />
                    </label>
                    <label class="label cursor-pointer gap-2">
                        <input type="radio" name="opsi-jawaban" class="radio " checked />
                        <span class="label-text">B</span>
                        <input required type="text" placeholder="Tulis Jawaban" class="input input-bordered w-full" />
                    </label>
                    <label class="label cursor-pointer gap-2">
                        <input type="radio" name="opsi-jawaban" class="radio " />
                        <span class="label-text">C</span>
                        <input required type="text" placeholder="Tulis Jawaban" class="input input-bordered w-full" />
                    </label>
                    <label class="label cursor-pointer gap-2">
                        <input type="radio" name="opsi-jawaban" class="radio " />
                        <span class="label-text">D</span>
                        <input required type="text" placeholder="Tulis Jawaban" class="input input-bordered w-full" />
                    </label>
                    <label class="label cursor-pointer gap-2">
                        <input type="radio" name="opsi-jawaban" class="radio " />
                        <span class="label-text">E</span>
                        <input required type="text" placeholder="Tulis Jawaban" class="input input-bordered w-full" />
                    </label>
            </div>

            {{-- #just an opsion --}}
            {{-- <div class="py-2 gap-2"> --}}
            {{-- <h1>Opsi Jawaban :<span class="text-red-600">*</span></h1> --}}
            {{-- <select class="select w-full"> --}}
            {{-- <option disabled selected>Opsi Jawaban</option> --}}
            {{-- <option>A</option> --}}
            {{-- <option>B</option> --}}
            {{-- <option>C</option> --}}
            {{-- <option>D</option> --}}
            {{-- <option>E</option> --}}
            {{-- </select> --}}
            {{-- </div> --}}

            <div class="grid grid-cols-2 gap-4 mb-5">
                <button class="btn btn-outline btn-primary">+ Tambah Soal</button>
                <button class="btn btn-secondary text-white">Simpan Bank Soal</button>
            </div>
            </form>
        </div>


    </div>

    <script>
        $(document).ready(function() {
            // Define the custom button
            var RumusButton = function(context) {
                var ui = $.summernote.ui;

                // Create button
                var button = ui.button({
                    contents: 'Rumus',
                    tooltip: 'Rumus',
                    click: function() {
                        rumus_0.showModal();
                    }
                });

                return button.render();

            };

            $('#summernote').summernote({
                placeholder: 'Tulis soal disini',
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['font', ['bold', 'underline', 'italic']],
                    ['insert', ['link', 'picture']],
                    ['mybutton', ['rumus']],
                ],
                buttons: {
                    rumus: RumusButton,
                }
            });
        });
    </script>
</x-app-layout>
