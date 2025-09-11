@extends('backend.template.index')

@section('content')
<div class="container">
    <!-- Judul di luar card -->
    <div class="mb-3 mt-2">
        <h3 class="fw-normal mb-3 ms-2" style="font-size: 1.4rem;">
            Daftar Fasilitas
        </h3>
    </div>

    <div class="card mt-2">
        <div class="card-header d-flex flex-wrap align-items-center gap-3">
            <!-- Tombol Tambah -->
            <a href="{{ route('fasilitas.create') }}" 
               class="btn btn-primary btn-sm">
               <i class="bi bi-plus-circle"></i> Tambah Data
            </a>

             <!-- Search -->
             <form action="{{ route('fasilitas.index') }}" method="GET" class="d-flex align-items-center gap-2 ms-auto">
                <label class="mb-0 d-flex align-items-center gap-2">
                    <input type="text" name="search" value="{{ request('search') }}" 
                           class="form-control" placeholder="Search">
                </label>
            </form>
        </div>

        <div class="card-body p-0">
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
                        @forelse($fasilitas as $key => $item)
                        <tr>
                            <td>{{ $fasilitas->firstItem() + $key }}.</td>
                            <td>{{ $item->title }}</td>
                            <td>
                                <div style="max-width:300px; max-height:120px; overflow:hidden;">
                                    {!! Str::limit(strip_tags($item->deskripsi), 120, '...') !!}
                                </div>
                            </td>
                            <td>
                                @if($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" 
                                         alt="Gambar" width="80" class="rounded">
                                @else
                                    <span class="text-muted">Tidak ada gambar</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <a href="{{ route('fasilitas.edit', $item->id) }}" 
                                       class="btn btn-sm btn-warning d-flex align-items-center gap-1">
                                        <i class="bi bi-pencil-square"></i> <span>Edit</span>
                                    </a>
                                    <form action="{{ route('fasilitas.destroy', $item->id) }}" 
                                          method="POST" class="delete-form d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-danger d-flex align-items-center gap-1 btn-delete">
                                            <i class="bi bi-trash"></i> <span>Delete</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">Tidak ada data fasilitas</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="card-footer d-flex align-items-center bg-transparent border-0 p-3">
            <div>
                Menampilkan {{ $fasilitas->firstItem() }}–{{ $fasilitas->lastItem() }} 
                dari {{ $fasilitas->total() }} data
            </div>
            <div class="ms-auto">
                {{ $fasilitas->links('pagination::bootstrap-5') }}
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
/* Search input */
.search-input {
    width: 150px !important;
    max-width: 150px !important;
    height: 32px;
    font-size: 0.9rem;
    padding: 0 10px;
    border-radius: 6px;
}
/* Deskripsi */
td div {
    font-size: 0.9rem;
    line-height: 1.4;
}
td div p {
    margin-bottom: 0.3rem;
}
/* Pagination Bootstrap custom */
.pagination .page-item .page-link {
    border-radius: 18px;
    min-width: 40px;
    height: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 13px;
    font-weight: 600;
    transition: all 0.3s ease;
}
.pagination .page-item .page-link:hover:not(.active):not(.disabled) {
    background-color: #0a58ca;
    color: #fff;
}
</style>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    // Konfirmasi hapus
    document.querySelectorAll(".btn-delete").forEach(button => {
        button.addEventListener("click", function (e) {
            e.preventDefault();
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
