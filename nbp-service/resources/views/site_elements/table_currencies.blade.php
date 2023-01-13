@if($currencies->isNotEmpty())

    <?php
    $converter = 10_000;
    $amount = 1000_000_000;
    ?>

    <p>przelicznik (na int): {{ $converter }}, ({{ Str::length($converter)-1 }})  | ilość: {{ $amount }} ({{ Str::length($amount)-1 }}) </p>

<table class="table table-sm table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">code</th>
            <th scope="col">rate (float)</th>
            <th scope="col">1 mld</th>
            <th scope="col">rate (int, * 10000)</th>
            <th scope="col">1 mld</th>
            <th scope="col">Roznica: float - int</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($currencies as $item)
            <?php
            $floatCost = $item->exchange_rate * $amount;
            $intCost = ($item->exchange_rate_int/$converter)*$amount;
            ?>
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ Str::limit($item->id, 4, '..') }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->currency_code }}</td>
                <td>{{ $item->exchange_rate }}</td>
                <td>{{ $floatCost }}</td>
                <td>{{ $item->exchange_rate_int }}</td>
                <td>{{ $intCost }}</td>
                <td>{{ $floatCost - $intCost }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@else
<p>Brak danych</p>
@endif
