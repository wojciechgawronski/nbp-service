@if($currencies->isNotEmpty())

<table class="table table-sm table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">code</th>
            <th scope="col">rate (float)</th>
            <th scope="col">1 mld</th>
            <th scope="col">rate (int)</th>
            <th scope="col">1 mld</th>
            <th scope="col">Roznica: float - int</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($currencies as $item)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ Str::limit($item->id, 4, '..') }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->currency_code }}</td>
                <td>{{ $item->exchange_rate }}</td>
                <td>-</td>
                <td>{{ $item->exchange_rate_int }}</td>
                <td>-</td>
                <td>-</td>
            </tr>
        @endforeach
    </tbody>
</table>

@else
<p>Brak danych</p>
@endif
