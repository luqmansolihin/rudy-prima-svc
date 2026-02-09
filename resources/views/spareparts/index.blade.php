@extends('layouts.app')

@push('additonal-styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
@endpush

@section('breadcrumb')
    <li class="breadcrumb-item">Master</li>
    <li class="breadcrumb-item active">Spareparts</li>
@endsection

@section('contents')
    <div class="card mb-4">
        <div class="card-header"><strong>Sparepart List</strong></div>
        <div class="card-body">
            @if (session('success'))
                <div id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="col-lg-2 p-0 mb-2">
                <a href="{{ route('spareparts.create') }}" class="btn btn-primary btn-block">Create Sparepart</a>
            </div>

            <div class="table-responsive">
                <table id="datatable" class="table table-bordered table-striped table-hover align-middle w-100">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Part Number</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($spareparts as $s)
                            <tr>
                                <td>{{ $s->sparepart_id }}</td>
                                <td>{{ $s->name }}</td>
                                <td>{{ $s->part_number }}</td>
                                <td>{{ number_format($s->buy_price, 2) }}</td>
                                <td>{{ number_format($s->sell_price, 2) }}</td>
                                <td>{{ $s->stock }}</td>
                                <td>
                                    <a href="{{ route('spareparts.edit', $s->sparepart_id) }}" class="badge bg-warning"
                                        title="Update">
                                        <svg width="14" height="14">
                                            <use
                                                xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-pencil') }}">
                                            </use>
                                        </svg>
                                    </a>

                                    <form action="{{ route('spareparts.destroy', $s->sparepart_id) }}" method="POST"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="badge bg-danger border-0" title="Delete"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus?')">
                                            <svg width="14" height="14">
                                                <use
                                                    xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-trash') }}">
                                                </use>
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('additional-scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

    <script>
        $('#datatable').DataTable({
            responsive: true,
            autoWidth: false,
            dom: '<"row mb-3"<"col-md-4"l><"col-md-4"B><"col-md-4"f>>rt<"row mt-3"<"col-md-6"i><"col-md-6"p>>',
            buttons: [{
                    extend: 'excel',
                    text: 'Excel',
                    className: 'dt-btn-coreui'
                },
                {
                    extend: 'csv',
                    text: 'CSV',
                    className: 'dt-btn-coreui'
                },
                {
                    extend: 'pdf',
                    text: 'PDF',
                    className: 'dt-btn-coreui'
                }
            ],
            columnDefs: [{
                    responsivePriority: 1,
                    targets: 1
                },
                {
                    responsivePriority: 2,
                    targets: -1
                }
            ],
            language: {
                paginate: {
                    previous: "‹",
                    next: "›"
                }
            }
        });

        document.addEventListener('DOMContentLoaded', () => {
            const successAlert = document.getElementById('successAlert');

            if (successAlert) {
                setTimeout(() => {
                    const alert = new coreui.Alert(successAlert);
                    alert.close();
                }, 5000); // 5 detik
            }
        });
    </script>
@endpush
