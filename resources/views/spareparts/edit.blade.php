@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item">Master</li>
    <li class="breadcrumb-item active">Spareparts</li>
@endsection

@section('contents')
    <div class="card mb-4">
        <div class="card-header"><strong>Edit Sparepart</strong></div>
        <div class="card-body">
            <form action="{{ route('spareparts.update', $sparepart->sparepart_id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    {{-- Nama --}}
                    <div class="col-md-6">
                        <label class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                            placeholder="Nama sparepart" value="{{ old('nama', $sparepart->name) }}" required>
                        @error('nama')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Part Number --}}
                    <div class="col-md-6">
                        <label class="form-label">Part Number</label>
                        <input type="text" name="part_number"
                            class="form-control @error('part_number') is-invalid @enderror" placeholder="Part number"
                            value="{{ old('part_number', $sparepart->part_number) }}" required>
                        @error('part_number')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Harga Beli --}}
                    <div class="col-md-6">
                        <label class="form-label">Harga Beli</label>
                        <input type="number" step="0.01" name="harga_beli"
                            class="form-control @error('harga_beli') is-invalid @enderror" placeholder="0.00"
                            value="{{ old('harga_beli', $sparepart->buy_price) }}" min="0" required>
                        @error('harga_beli')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Harga Jual --}}
                    <div class="col-md-6">
                        <label class="form-label">Harga Jual</label>
                        <input type="number" step="0.01" name="harga_jual"
                            class="form-control @error('harga_jual') is-invalid @enderror" placeholder="0.00"
                            value="{{ old('harga_jual', $sparepart->sell_price) }}" min="0" required>
                        @error('harga_jual')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Stok --}}
                    <div class="col-md-6">
                        <label class="form-label">Stok</label>
                        <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror"
                            placeholder="0" value="{{ old('stock', $sparepart->stock) }}" min="0" disabled required>
                        @error('stock')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Perbarui</button>
                    <a href="{{ route('spareparts.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('additional-scripts')
    <script>
        (function() {
            const hargaBeli = document.querySelector('input[name="harga_beli"]');
            const hargaJual = document.querySelector('input[name="harga_jual"]');

            function calc() {
                const val = parseFloat(hargaBeli.value) || 0;
                hargaJual.value = (val * 1.3).toFixed(2);
            }

            if (hargaBeli && hargaJual) {
                hargaBeli.addEventListener('input', calc);
                // initial calculate in case of prefilled value
                calc();
            }
        })();
    </script>
@endpush
