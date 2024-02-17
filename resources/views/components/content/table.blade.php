@props([
    'edit' => '',
    'url' => '',
    'headers' => [],
    'rows' => [],
])
<div class="tables-responsive overflow-y-auto mt-10">
    <table class="tables">
        <thead>
            <tr>
                @foreach ($headers as $header)
                    <th>{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($rows as $row)

                <tr>
                    @foreach ($row as $cell)
                        <td>{{ $cell }}</td>
                    @endforeach
                    <td>
                        <a class="inline-flex  items-center px-4 py-2 rounded-lg bg-theme-border-sidebar/20 text-theme-border-sidebar text-sm md:text-left font-medium" href="#">Edit</a>
                        <button class="inline-flex items-center px-4 py-2 rounded-lg bg-theme-border-sidebar text-white text-sm md:text-left font-medium" href=""  onclick=#">Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
