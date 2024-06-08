<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Kuis</th>
                <th>Jumlah Soal</th>
                <th>Jumlah Soal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $ready)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $ready->quiz->title }}</td>
                <td>{{ $ready->quiz->questions[0]->correct_answer}}</td>
                <td>{{ $ready->quiz->questions->count() }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
