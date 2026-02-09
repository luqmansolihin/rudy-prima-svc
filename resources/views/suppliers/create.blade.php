@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item">Master</li>
    <li class="breadcrumb-item active">Supplier</li>
@endsection

@section('contents')
    <div class="card mb-4">
        <div class="card-header"><strong>Create Supplier</strong></div>
        <div class="card-body">
            <form action="{{ route('suppliers.store') }}" method="POST">
                @csrf

                <div class="row g-3">
                    {{-- Nama --}}
                    <div class="col-md-6">
                        <label class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                            placeholder="Masukkan nama supplier" value="{{ old('nama') }}" required>
                        @error('nama')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Kontak Person --}}
                    <div class="col-md-6">
                        <label class="form-label">Kontak Person</label>
                        <input type="text" name="kontak_person"
                            class="form-control @error('kontak_person') is-invalid @enderror"
                            placeholder="Masukkan kontak person" value="{{ old('kontak_person') }}" required>
                        @error('kontak_person')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Telepon --}}
                    <div class="col-md-6">
                        <label class="form-label">Telepon</label>
                        <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror"
                            placeholder="08xxxxxxxxxx atau 628xxxxxxxxx" value="{{ old('telepon') }}" required>
                        @error('telepon')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Alamat --}}
                    <div class="col-md-12">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3"
                            placeholder="Masukkan alamat lengkap" required>{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                    <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
