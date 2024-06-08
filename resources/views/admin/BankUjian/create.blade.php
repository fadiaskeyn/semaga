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
                        <input type="radio" name="jenis-ujian-1" class="radio" checked /> Pilihan Ganda
                        <input type="radio" name="jenis-ujian-1" class="radio" /> Uraian
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
                    <div class="flex items-center mt-5 text-primary gap-4">
                        <label>Soal ke - ${questionCount}</label>
                        <input type="radio" name="jenis-ujian-${questionCount}" class="radio" checked /> Pilihan Ganda
                        <input type="radio" name="jenis-ujian-${questionCount}" class="radio" /> Uraian
                    </div>
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

        $('#summernote').summernote({
            height: ($(window).height() - 300),
            callbacks: {
                onImageUpload: function(image) {
                    uploadImage(image[0]);
                }
            }
        });

        function uploadImage(image) {
            var data = new FormData();
            data.append("image", image);
            $.ajax({
                url: 'Your url to deal with your image',
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                type: "post",
                success: function(url) {
                    var image = $('<img>').attr('src', 'http://' + url);
                    $('#summernote').summernote("insertNode", image[0]);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

    </script>
</x-app-layout>
