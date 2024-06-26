<x-app-layout>
    <a class="btn sm:btn-wide" href="{{route('admin.dashboard')}}">Back to dashboard</a>
    <a class="btn sm:btn-wide btn-primary float-end text-xl" href="#">ADD</a>
    <div class="container bg-white overflow-auto rounded-lg m-4">
        <form method="POST" action="{{ route('admin.quizready.update', ['quiz_id' => $quiz_id]) }}">
            @csrf
            <table class="table table-zebra my-4">
                <thead>
                    <tr>
                        <th>Pilih Soal</th>
                        <th>Soal</th>
                        <th>Kunci Jawaban</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($questions as $question)
                    <tr>
                        <th>
                            <div class="flex items-center ps-3">
                                <input
                                    id="question-{{ $question->id }}"
                                    name="questions[]"
                                    type="checkbox"
                                    value="{{ $question->id }}"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                    @if(in_array($question->id, $selectedQuestions)) checked @endif>
                                <label for="question-{{ $question->id }}" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pilih</label>
                            </div>
                        </th>
                        <td>{!! $question->question !!}</td>
                        <td>{{ $question->correct_answer }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</x-app-layout>
