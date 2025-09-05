@extends('backend.template.index')
@section('content')

<div class="container">
    <!-- Judul di luar card -->
    <div class="mb-3 mt-2">
        <h3 style="margin: 0 0 20px 6px; font-weight: normal; font-size: 1.4rem;">
            Daftar Sosmed
        </h3>
    </div>

    <div class="card mt-2">
        <div class="card-header d-flex flex-wrap align-items-center gap-3">
            <!-- Tombol Tambah -->
            <a href="{{ route('sosmed.create') }}" 
               class="btn btn-primary btn-sm">
               <i class="bi bi-plus-circle"></i> Tambah Data
            </a>

            <!-- Search -->
            <form action="{{ route('sosmed.index') }}" method="GET" class="d-flex align-items-center ms-auto" style="flex:0 0 auto;">
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
                            <th>Link</th>
                            <th>Image</th>
                            <th>Color</th>
                            <th style="width: 150px" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($sosmeds as $key => $item)
                        <tr>
                            <td>{{ $sosmeds->firstItem() + $key }}.</td>
                            <td>
                                <a href="{{ $item->link }}" target="_blank">{{ $item->link }}</a>
                            </td>
                            <td>
                                @if($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="Icon" width="60" class="rounded">
                                @else
                                    <span class="text-muted">Tidak ada gambar</span>
                                @endif
                            </td>
                            <td>
                                @if($item->color)
                                    <span class="badge" style="background-color: {{ $item->color }};">
                                        {{ $item->color }}
                                    </span>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <a href="{{ route('sosmed.edit', $item->id) }}" class="btn btn-sm btn-warning d-flex align-items-center gap-1">
                                        <i class="bi bi-pencil-square"></i> <span>Edit</span>
                                    </a>
                                    <form action="{{ route('sosmed.destroy', $item->id) }}" method="POST" class="delete-form d-inline">
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
                            <td colspan="5" class="text-center py-4">Tidak ada data sosmed</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="card-footer d-flex align-items-center bg-transparent border-0 p-3">
            <div>
                Menampilkan {{$sosmeds->firstItem() }}–{{$sosmeds->lastItem() }} dari {{$sosmeds->total() }} data
            </div>
            <div style="margin-left:auto; margin-right:0;">
                <ul class="pagination mb-0">
                    @if ($sosmeds->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">Previous</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{$sosmeds->previousPageUrl() }}">Previous</a></li>
                    @endif

                    @foreach ($sosmeds->getUrlRange(1,$sosmeds->lastPage()) as $page => $url)
                        @if ($page ==$sosmeds->currentPage())
                            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach

                    @if ($sosmeds->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{$sosmeds->nextPageUrl() }}">Next</a></li>
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
.btn {
    border-radius: 20px;
    font-size: 0.9rem;
    padding: 0.35rem 0.85rem;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-weight: 500;
}
.search-input {
    width: 150px !important;
    max-width: 150px !important;
    flex: 0 0 auto !important;
    height: 32px;
    font-size: 0.9rem;
    padding: 0 10px;
    border-radius: 6px;
}
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

    @if(session('success'))
        Swal.fire({
            icon: "success",
            title: "Berhasil",
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2000
        });
    @endif

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
