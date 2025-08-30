@extends('backend.template.index')
@section('content')

<div class="container">
    <!-- Judul di luar card -->
    <div class="mb-3 mt-2">
        <h3 style="margin: 0 0 20px 6px; font-weight: normal; font-size: 1.4rem;">
            Daftar Kegiatan
        </h3>
    </div>

    <div class="card mt-2">
        <div class="card-header d-flex flex-wrap align-items-center gap-3">
            <!-- Tombol Tambah -->
            <a href="{{ route('kegiatan.create') }}" 
               class="btn btn-primary btn-sm">
               <i class="bi bi-plus-circle"></i> Tambah Data
            </a>

            <!-- Search -->
            <form action="{{ route('kegiatan.index') }}" method="GET" class="d-flex align-items-center ms-auto" style="flex:0 0 auto;">
                <input type="text" name="search" value="{{ request('search') }}" 
                       class="form-control search-input" placeholder="Search">
            </form>
        </div>

        <div class="card-body p-0">
            <div class="p-3"></div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th style="width: 150px" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kegiatan as $key => $item)
                        <tr>
                            <td>{{ $kegiatan->firstItem() + $key }}.</td>
                            <td>{{ $item->title }}</td>
                            <td>
                                <div style="max-width:300px; max-height:120px; overflow:hidden;">
                                    {!! $item->deskripsi !!}
                                </div>
                            </td>
                            <td>
                                @if($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="Gambar" width="80" class="rounded">
                                @else
                                    <span class="text-muted">Tidak ada gambar</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <a href="{{ route('kegiatan.edit', $item->id) }}" class="btn btn-sm btn-warning d-flex align-items-center gap-1">
                                        <i class="bi bi-pencil-square"></i> <span>Edit</span>
                                    </a>
                                    <form action="{{ route('kegiatan.destroy', $item->id) }}" method="POST" class="delete-form d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger d-flex align-items-center gap-1 btn-delete">
                                            <i class="bi bi-trash"></i> <span>Delete</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">Tidak ada data kegiatan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="card-footer d-flex align-items-center bg-transparent border-0 p-3">
            <div>
                Menampilkan {{ $kegiatan->firstItem() }}–{{ $kegiatan->lastItem() }} dari {{ $kegiatan->total() }} data
            </div>
            <div style="margin-left:auto; margin-right:0;">
                <ul class="pagination mb-0">
                    @if ($kegiatan->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">Previous</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $kegiatan->previousPageUrl() }}">Previous</a></li>
                    @endif

                    @foreach ($kegiatan->getUrlRange(1, $kegiatan->lastPage()) as $page => $url)
                        @if ($page == $kegiatan->currentPage())
                            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach

                    @if ($kegiatan->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $kegiatan->nextPageUrl() }}">Next</a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link">Next</span></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
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
/* Search input fix kecil */
.search-input {
    width: 150px !important;
    max-width: 150px !important;
    flex: 0 0 auto !important;
    height: 32px;
    font-size: 0.9rem;
    padding: 0 10px;
    border-radius: 6px;
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
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        gap: 10px;
    }
    .card-header .btn {
        flex: 0 0 auto;
        white-space: nowrap;
    }
    .search-input {
        width: 120px !important;
        max-width: 120px !important;
    }
    .pagination .page-item .page-link {
        min-width: 40px;
        height: 40px;
        font-size: 13px;
    }
}
</style>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    // Konfirmasi hapus
    document.querySelectorAll(".btn-delete").forEach(button => {
        button.addEventListener("click", function () {
            let form = this.closest("form");

            Swal.fire({
                title: "Yakin hapus data?",
                text: "Data yang sudah dihapus tidak bisa dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#6c757d",
                confirmButtonText: "Ya, hapus!"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

    // Notifikasi sukses
    @if(session('success'))
        Swal.fire({
            icon: "success",
            title: "Berhasil",
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2000
        });
    @endif

    // Notifikasi error
    @if(session('error'))
        Swal.fire({
            icon: "error",
            title: "Gagal",
            text: "{{ session('error') }}",
            showConfirmButton: true
        });
    @endif
});
</script>
@endsection
