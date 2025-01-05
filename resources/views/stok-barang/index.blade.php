@extends('layouts.app')

@section('content')
<h1 class="mb-4">Stok Barang</h1>

<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Quantity</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($stokBarang as $item)
        <tr>
            <td>{{ $item->kode_barang }}</td>
            <td>{{ $item->nama_barang }}</td>
            <td>{{ $item->quantity }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection