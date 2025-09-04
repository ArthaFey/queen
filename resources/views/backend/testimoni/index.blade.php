@extends('backend.template.index')
@section('content')

<div class="container">
    <!-- Judul -->
    <div class="mb-3 mt-2">
        <h3 style="margin: 0 0 20px 6px; font-weight: normal; font-size: 1.4rem;">
            Daftar Testimoni
        </h3>
    </div>

    <div class="card mt-2">
        <div class="card-header d-flex flex-wrap align-items-center gap-3">
            <!-- Tombol Tambah -->
            <a href="{{ route('testimoni.create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-circle"></i> Tambah Testimoni
            </a>

            <!-- Search -->
            <form action="{{ route('testimoni.index') }}" method="GET" class="d-flex align-items-center gap-2 ms-auto">
                <label class="mb-0 d-flex align-items-center gap-2">
                    <span>Search:</span>
                    <input type="text" name="search" value="{{ request('search') }}"
                        class="form-control" placeholder="Cari testimoni...">
                </label>
            </form>
        </div>

        <div class="card-body p-0">
            <div class="p-3"></div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Nama</th>
                            <th>Review</th>
                            <th>Gambar</th>
                            <th style="width: 150px" class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($testimonis as $key => $item)
                        <tr>
                            <td>{{ $testimonis->firstItem() + $key }}.</td>
                            <td>{{ $item->alt }}</td>
                            <td>{{ Str::limit($item->review, 50) }}</td>
                            <td>
                                @if($item->src)
                                <img src="{{ asset('uploads/testimoni/' . $item->src) }}"
                                    alt="{{ $item->alt }}" width="100" class="rounded">
                                @else
                                <span class="text-muted">Tidak ada gambar</span>
                                @endif
                            </td>

                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <a href="{{ route('testimoni.edit', $item->id) }}" class="btn btn-sm btn-warning d-flex align-items-center gap-1">
                                        <i class="bi bi-pencil-square"></i> <span>Edit</span>
                                    </a>
                                    <form action="{{ route('testimoni.destroy', $item->id) }}" method="POST" class="delete-form d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger d-flex align-items-center gap-1 delete-btn">
                                            <i class="bi bi-trash"></i> <span>Hapus</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">Tidak ada data testimoni</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="card-footer d-flex align-items-center bg-transparent border-0 p-3">
            <div>
                Menampilkan {{ $testimonis->firstItem() }}–{{ $testimonis->lastItem() }} dari {{ $testimonis->total() }} data
            </div>

            <div style="margin-left:auto; margin-right:0;">
                <ul class="pagination mb-0">
                    @if ($testimonis->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">Previous</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $testimonis->previousPageUrl() }}">Previous</a></li>
                    @endif

                    @foreach ($testimonis->getUrlRange(1, $testimonis->lastPage()) as $page => $url)
                        @if ($page == $testimonis->currentPage())
                            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach

                    @if ($testimonis->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $testimonis->nextPageUrl() }}">Next</a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link">Next</span></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
@if(session('success'))
<script>
    Swal.fire({
        title: "Berhasil!",
        text: "{{ session('success') }}",
        icon: "success",
        timer: 2000,              // otomatis hilang 2 detik
        showConfirmButton: false  // tombol OK dihilangkan
    });
</script>
@endif

@endsection

@section('styles')
<style>
    /* Tombol seragam */
    .btn {
        border-radius: 20px;
        font-size: 0.9rem;
        padding: 0.35rem 0.85rem;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-weight: 500;
    }

    /* Search */
    .card-header form label {
        font-weight: 500;
        color: #333;
        font-size: 0.95rem;
    }

    .card-header form input.form-control {
        max-width: 200px;
        height: 32px;
        font-size: 0.9rem;
        padding: 0 8px;
        border-radius: 4px;
    }

    /* Teks di tabel */
    td {
        font-size: 0.9rem;
    }

    /* Pagination */
    .pagination .page-item .page-link {
        border-radius: 18px;
        min-width: 60px;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 15px;
        font-weight: 600;
        color: #0d6efd;
        background-color: #fff;
        border: 1px solid #dee2e6;
        transition: all 0.3s ease;
    }
    .pagination .page-item.active .page-link {
        background-color: #0d6efd;
        color: #fff;
        border-color: #0d6efd;
    }
    .pagination .page-item.disabled .page-link {
        color: #6c757d;
        background-color: #f8f9fa;
        border-color: #dee2e6;
    }
    .pagination .page-item .page-link:hover:not(.active):not(.disabled) {
        background-color: #0a58ca;
        color: #fff;
    }
</style>
@endsection

@section('scripts')
<!-- Ganti ke SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "Apakah kamu yakin?",
                    text: "Data yang dihapus tidak bisa dikembalikan!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ya, Hapus",
                    cancelButtonText: "Batal",
                    confirmButtonColor: "#dc3545", // merah
                    cancelButtonColor: "#0d6efd", // biru
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
@endsection
