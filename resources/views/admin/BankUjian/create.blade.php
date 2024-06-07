<x-app-layout>
    @section('breadcrumbs')
    {{ Breadcrumbs::render('BuatBankSoal') }}
    @endsection

    {{--  <dialog aria-label="dialog rumus" id="rumus_0" class="modal modal-top">
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
    </dialog>  --}}

    <div aria-label="soal-container" class="md:grid gap-4">
        <div aria-label="soal-ke-x" class="bg-white rounded-xl px-4">
            <div class="flex items-center mt-5 text-primary gap-4">
                <label>Soal ke - X </label>
                <input type="radio" name="jenis-ujian" class="radio" checked /> Pilihan Ganda
                <input type="radio" name="jenis-ujian" class="radio" /> Uraian
            </div>
            <form action="{{ route('banks.store') }}" method="POST">
                <h1>Pertanyaan <span class="text-red-600">*</span></h1>
                <textarea aria-label="rumus" id="summernote" name="question"></textarea>
                <div class="grid items-center py-2 gap-4">
                    @csrf
                    <label class="label cursor-pointer gap-2">
                        <input type="radio" name="correct_answer" value="option1" class="radio" />
                        <span class="label-text">A</span>
                        <input required type="text" placeholder="Tulis Jawaban" class="input input-bordered w-full" name="option1"/>
                    </label>
                    <label class="label cursor-pointer gap-2">
                        <input type="radio" name="correct_answer" value="option2" class="radio" />
                        <span class="label-text">B</span>
                        <input required type="text" placeholder="Tulis Jawaban" class="input input-bordered w-full" name="option2"/>
                    </label>
                    <label class="label cursor-pointer gap-2">
                        <input type="radio" name="correct_answer" value="option3" class="radio" />
                        <span class="label-text">C</span>
                        <input required type="text" placeholder="Tulis Jawaban" class="input input-bordered w-full" name="option3"/>
                    </label>
                    <label class="label cursor-pointer gap-2">
                        <input type="radio" name="correct_answer" value="option4" class="radio" />
                        <span class="label-text">D</span>
                        <input required type="text" placeholder="Tulis Jawaban" class="input input-bordered w-full" name="option4"/>
                    </label>
                    <label class="label cursor-pointer gap-2">
                        <input type="radio" name="correct_answer" value="option5" class="radio" />
                        <span class="label-text">E</span>
                        <input required type="text" placeholder="Tulis Jawaban" class="input input-bordered w-full" name="option5"/>
                    </label>
                </div>
                <div class="grid grid-cols-2 gap-4 mb-5">
                    <button class="btn btn-outline btn-primary">+ Tambah Soal</button>
                    <button type="submit" class="btn btn-secondary text-white">Simpan Bank Soal</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var RumusButton = function(context) {
                var ui = $.summernote.ui;
                var button = ui.button({
                    contents: 'Buat Rumus',
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
                    {{--  ['mybutton', ['rumus']],  --}}
                ],
                buttons: {
                    rumus: RumusButton,
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const input1 = document.getElementById('input1');
            const radio1 = document.getElementById('radio1');
            const input2 = document.getElementById('input2');
            const radio2 = document.getElementById('radio2');
            const input3 = document.getElementById('input3');
            const radio3 = document.getElementById('radio3');
            const input4 = document.getElementById('input4');
            const radio4 = document.getElementById('radio4');
            const input5 = document.getElementById('input5');
            const radio5 = document.getElementById('radio5');

            input1.addEventListener('input', function() {
                radio1.value = input1.value;
            });

            input2.addEventListener('input', function() {
                radio2.value = input2.value;
            });

            input3.addEventListener('input', function() {
                radio3.value = input3.value;
            });

            input4.addEventListener('input', function() {
                radio4.value = input4.value;
            });

            input5.addEventListener('input', function() {
                radio5.value = input5.value;
            });
        });


    </script>
</x-app-layout>
