@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item">Master</li>
    <li class="breadcrumb-item active">Customer</li>
@endsection

@section('contents')
    <div class="card mb-4">
        <div class="card-header"><strong>Create Customer</strong></div>
        <div class="card-body">
            <form action="{{ route('customers.store') }}" method="POST">
                @csrf

                <div class="row g-3">
                    {{-- Nama --}}
                    <div class="col-md-6">
                        <label class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                            placeholder="Masukkan nama" value="{{ old('nama') }}" required>
                        @error('nama')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Telepon --}}
                    <div class="col-md-6">
                        <label class="form-label">Telepon</label>
                        <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror"
                            placeholder="08xxxxxxxxxx" value="{{ old('telepon') }}" required>
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

                    {{-- Armada --}}
                    <div class="col-md-6">
                        <label class="form-label">Armada</label>
                        <input type="text" name="armada" class="form-control @error('armada') is-invalid @enderror"
                            placeholder="Masukkan nama armada" value="{{ old('armada') }}" required>
                        @error('armada')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tagihan --}}
                    <div class="col-md-6">
                        <label class="form-label">Tagihan</label>
                        <input type="number" name="tagihan" class="form-control @error('tagihan') is-invalid @enderror"
                            placeholder="0" value="{{ old('tagihan') }}" min="0" required>
                        @error('tagihan')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                    <a href="{{ route('customers.index') }}" class="btn btn-secondary">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
