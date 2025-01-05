@extends('layouts.app')

@section('content')
<h1 class="mb-4">Barang Masuk</h1>

@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('barang-masuk.add') }}" method="POST" class="mb-4">
    @csrf
    <div class="row g-3">
        <div class="col-md-3">
            <input type="text" name="kode_barang" class="form-control" placeholder="Kode Barang" required>
        </div>
        <div class="col-md-3">
            <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" required>
        </div>
        <div class="col-md-2">
            <input type="number" name="quantity" class="form-control" placeholder="Quantity" required>
        </div>
        <div class="col-md-2">
            <input type="text" name="origin" class="form-control" placeholder="Asal Barang">
        </div>
        <div class="col-md-2">
            <input type="date" name="tanggal_masuk" class="form-control" required>
        </div>
        <div class="col-md-12 mt-3">
            <button type="submit" class="btn btn-primary w-100">Tambah Barang Masuk</button>
        </div>
    </div>
</form>

<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Quantity</th>
            <th>Asal Barang</th>
            <th>Tanggal Masuk</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($barangMasuk as $item)
        <tr>
            <td>{{ $item->kode_barang }}</td>
            <td>{{ $item->nama_barang }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->origin }}</td>
            <td>{{ $item->tanggal_masuk }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection