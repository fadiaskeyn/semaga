<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('BuatBankSoal') }}
    @endsection

    <div aria-label="soal-container" class="md:grid gap-4">
        <form action="{{ route('banks.store') }}" method="POST" id="soal-form">
            @csrf
            <div id="form-container">
                <div aria-label="soal-ke-1" class="soal-form bg-white rounded-xl px-4 mb-4">
                    <div class="flex items-center mt-5 text-primary gap-4">
                        <label>Soal ke - 1</label>
                        <input type="text" name="" class="block appearance-none bg-white border mt-3 border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline ml-20" placeholder="Tulis BAB"/>
                        <select name="" class="block appearance-none bg-white border mt-3 border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" placeholder="Pilih Mata Pelajaran">
                        <option>Pilih Mata Pelajaran</option>
                            <option>Option 2</option>
                            <option>Option 3</option>
                        </select>
                    </div>
                    <h1>Pertanyaan <span class="text-red-600">*</span></h1>
                    <textarea aria-label="rumus" id="summernote-1" name="question-1"></textarea>
                    <div class="grid items-center py-2 gap-4">
                        <label class="label cursor-pointer gap-2">
                            <input type="radio" name="correct_answer-1" value="option1" class="radio" />
                            <span class="label-text">A</span>
                            <input required type="text" placeholder="Tulis Jawaban" class="input input-bordered w-full" name="option1-1"/>
                        </label>
                        <label class="label cursor-pointer gap-2">
                            <input type="radio" name="correct_answer-1" value="option2" class="radio" />
                            <span class="label-text">B</span>
                            <input required type="text" placeholder="Tulis Jawaban" class="input input-bordered w-full" name="option2-1"/>
                        </label>
                        <label class="label cursor-pointer gap-2">
                            <input type="radio" name="correct_answer-1" value="option3" class="radio" />
                            <span class="label-text">C</span>
                            <input required type="text" placeholder="Tulis Jawaban" class="input input-bordered w-full" name="option3-1"/>
                        </label>
                        <label class="label cursor-pointer gap-2">
                            <input type="radio" name="correct_answer-1" value="option4" class="radio" />
                            <span class="label-text">D</span>
                            <input required type="text" placeholder="Tulis Jawaban" class="input input-bordered w-full" name="option4-1"/>
                        </label>
                        <label class="label cursor-pointer gap-2">
                            <input type="radio" name="correct_answer-1" value="option5" class="radio" />
                            <span class="label-text">E</span>
                            <input required type="text" placeholder="Tulis Jawaban" class="input input-bordered w-full" name="option5-1"/>
                        </label>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 mb-5">
                <button type="button" id="add-question-btn" class="btn btn-outline btn-primary">+ Tambah Soal</button>
                <button type="submit" class="btn btn-secondary text-white">Simpan Bank Soal</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <script>
        $(document).ready(function() {
            function initializeSummernote() {
                $('[id^="summernote"]').each(function() {
                    $(this).summernote({
                        placeholder: 'Tulis soal disini',
                        tabsize: 2,
                        height: 120,
                        toolbar: [
                            ['font', ['bold', 'underline', 'italic']],
                            ['insert', ['link', 'picture']],
                        ]
                    });
                });
            }

            initializeSummernote();
            let questionCount = 1;

            document.getElementById('add-question-btn').addEventListener('click', function() {
                questionCount++;
                const newForm = document.createElement('div');
                newForm.setAttribute('aria-label', `soal-ke-${questionCount}`);
                newForm.classList.add('soal-form', 'bg-white', 'rounded-xl', 'px-4', 'mb-4');
                newForm.innerHTML = `
                    <h1>Pertanyaan <span class="text-red-600">*</span></h1>
                    <textarea aria-label="rumus" id="summernote-${questionCount}" name="question-${questionCount}"></textarea>
                    <div class="grid items-center py-2 gap-4">
                        <label class="label cursor-pointer gap-2">
                            <input type="radio" name="correct_answer-${questionCount}" value="option1" class="radio" />
                            <span class="label-text">A</span>
                            <input required type="text" placeholder="Tulis Jawaban" class="input input-bordered w-full" name="option1-${questionCount}"/>
                        </label>
                        <label class="label cursor-pointer gap-2">
                            <input type="radio" name="correct_answer-${questionCount}" value="option2" class="radio" />
                            <span class="label-text">B</span>
                            <input required type="text" placeholder="Tulis Jawaban" class="input input-bordered w-full" name="option2-${questionCount}"/>
                        </label>
                        <label class="label cursor-pointer gap-2">
                            <input type="radio" name="correct_answer-${questionCount}" value="option3" class="radio" />
                            <span class="label-text">C</span>
                            <input required type="text" placeholder="Tulis Jawaban" class="input input-bordered w-full" name="option3-${questionCount}"/>
                        </label>
                        <label class="label cursor-pointer gap-2">
                            <input type="radio" name="correct_answer-${questionCount}" value="option4" class="radio" />
                            <span class="label-text">D</span>
                            <input required type="text" placeholder="Tulis Jawaban" class="input input-bordered w-full" name="option4-${questionCount}"/>
                        </label>
                        <label class="label cursor-pointer gap-2">
                            <input type="radio" name="correct_answer-${questionCount}" value="option5" class="radio" />
                            <span class="label-text">E</span>
                            <input required type="text" placeholder="Tulis Jawaban" class="input input-bordered w-full" name="option5-${questionCount}"/>
                        </label>
                    </div>
                `;
                document.getElementById('form-container').appendChild(newForm);
                initializeSummernote();
            });
        });
    </script>
</x-app-layout>
