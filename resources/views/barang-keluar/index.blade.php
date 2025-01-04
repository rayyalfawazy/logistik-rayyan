@extends('layouts.app')

@section('content')
<h1 class="mb-4">Barang Keluar</h1>

@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('barang-keluar.add') }}" method="POST" class="mb-4">
    @csrf
    <div class="row g-3">
        <div class="col-md-3">
            <input type="text" name="kode_barang" class="form-control" placeholder="Kode Barang" required>
        </div>
        <div class="col-md-3">
            <input type="number" name="quantity" class="form-control" placeholder="Quantity" required>
        </div>
        <div class="col-md-3">
            <input type="text" name="destination" class="form-control" placeholder="Tujuan Barang">
        </div>
        <div class="col-md-3">
            <input type="date" name="tanggal_keluar" class="form-control" required>
        </div>
        <div class="col-md-12 mt-3">
            <button type="submit" class="btn btn-danger w-100">Tambah Barang Keluar</button>
        </div>
    </div>
</form>

<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Quantity</th>
            <th>Tujuan Barang</th>
            <th>Tanggal Keluar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($barangKeluar as $item)
        <tr>
            <td>{{ $item->kode_barang }}</td>
            <td>{{ $item->stokBarang->nama_barang ?? 'N/A' }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->destination }}</td>
            <td>{{ $item->tanggal_keluar }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection