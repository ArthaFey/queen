@extends('backend.template.index')

@section('content')
<div class="container">
    <!-- Judul di luar card -->
    <div class="mb-3 mt-2">
        <h3 style="margin: 0 0 20px 6px; font-weight: normal; font-size: 1.4rem;">
            Daftar Sertifikat
        </h3>
    </div>

    <div class="card mt-2">
        <div class="card-header d-flex flex-wrap align-items-center gap-3">
            <!-- Tombol Tambah -->
            <a href="{{ route('backend.sertifikat.create') }}" 
               class="btn btn-primary btn-sm">
               <i class="bi bi-plus-circle"></i> Tambah Data
            </a>

            <!-- Search -->
            <form action="{{ route('sertifikat.index') }}" method="GET" class="d-flex align-items-center gap-2 ms-auto">
                <label class="mb-0 d-flex align-items-center gap-2">
                    <span>Search:</span>
                    <input type="text" name="search" value="{{ request('search') }}" 
                           class="form-control" placeholder="">
                </label>
            </form>
        </div>

        <div class="card-body p-0">
            <div class="p-3"></div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Judul</th>
                            <th>Gambar</th>
                            <th style="width: 150px" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sertifikats as $item)
                        <tr>
                            <td>{{ $item->alt }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $item->src) }}" 
                                     alt="{{ $item->alt }}" 
                                     width="80" 
                                     class="rounded">
                            </td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <a href="{{ route('sertifikat.edit', $item->id) }}" 
                                       class="btn btn-sm btn-warning d-flex align-items-center gap-1">
                                        <i class="bi bi-pencil-square"></i> <span>Edit</span>
                                    </a>

                                    <form action="{{ route('sertifikat.destroy', $item->id) }}" 
                                          method="POST" 
                                          class="delete-form d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-danger d-flex align-items-center gap-1 delete-btn">
                                            <i class="bi bi-trash"></i> <span>Hapus</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center">Tidak ada data ditemukan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="card-footer d-flex align-items-center bg-transparent border-0 p-3">
                <div>
                    Menampilkan {{ $sertifikats->firstItem() }}–{{ $sertifikats->lastItem() }} dari {{ $sertifikats->total() }} data
                </div>
                <div style="margin-left:auto; margin-right:0;">
                    <ul class="pagination mb-0">
                        @if ($sertifikats->onFirstPage())
                            <li class="page-item disabled"><span class="page-link">Previous</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $sertifikats->previousPageUrl() }}">Previous</a></li>
                        @endif

                        @foreach ($sertifikats->getUrlRange(1, $sertifikats->lastPage()) as $page => $url)
                            @if ($page == $sertifikats->currentPage())
                                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach

                        @if ($sertifikats->hasMorePages())
                            <li class="page-item"><a class="page-link" href="{{ $sertifikats->nextPageUrl() }}">Next</a></li>
                        @else
                            <li class="page-item disabled"><span class="page-link">Next</span></li>
                        @endif
                    </ul>
                </div>
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
        showConfirmButton: false, // Hilangin tombol OK
        timerProgressBar: true // Biar ada progress bar waktu
    });
</script>
@endif
@endsection



{{-- Scripts --}}
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "Yakin hapus?",
                    text: "Data yang dihapus tidak bisa dikembalikan!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Ya, hapus!",
                    cancelButtonText: "Batal"
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


{{-- Styles --}}
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

/* Deskripsi summernote */
td div {
    font-size: 0.9rem;
    line-height: 1.4;
}
td div p {
    margin-bottom: 0.3rem;
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

/* Responsif */
@media (max-width: 768px) {
    .card-header {
        flex-direction: column;
        align-items: stretch;
        gap: 8px;
    }
    .card-header form input.form-control {
        max-width: 100%;
    }
    .card-header .btn { width: 100%; }
    .pagination .page-item .page-link {
        min-width: 40px;
        height: 40px;
        font-size: 13px;
    }
}
</style>
@endsection
