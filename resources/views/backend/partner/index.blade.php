@extends('backend.template.index')

@section('content')
<div class="container">
    <!-- Judul -->
    <div class="mb-3 mt-2">
        <h3 class="fw-normal" style="margin-left: 6px; font-size: 1.4rem;">
            Daftar partner
        </h3>
    </div>

    <div class="card mt-2 shadow-sm">
        <div class="card-header d-flex flex-wrap align-items-center gap-3">
            <!-- Tombol Tambah -->
            <a href="{{ route('backend.partner.create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-circle"></i> Tambah Data
            </a>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover align-middle mb-0">
                    <thead class="table-light text-center">
                        <tr>
                            <th style="width: 200px">Gambar</th>
                            <th style="width: 150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($partners as $item)
                        <tr class="text-center">
                            <td>
                                <img src="{{ asset('storage/' . $item->src) }}" 
                                     alt="{{ $item->alt }}" 
                                     width="120" 
                                     class="rounded shadow-sm">
                            </td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('partner.edit', $item->id) }}" 
                                       class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('partner.destroy', $item->id) }}" 
                                          method="POST" 
                                          class="delete-form d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-danger delete-btn">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="text-center">Tidak ada data ditemukan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="card-footer d-flex align-items-center bg-transparent border-0 p-3">
                <div>
                    Menampilkan {{ $partners->firstItem() }}–{{ $partners->lastItem() }} dari {{ $partners->total() }} data
                </div>
                <div style="margin-left:auto; margin-right:0;">
                    <ul class="pagination mb-0">
                        @if ($partners->onFirstPage())
                            <li class="page-item disabled"><span class="page-link">Previous</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $partners->previousPageUrl() }}">Previous</a></li>
                        @endif

                        @foreach ($partners->getUrlRange(1, $partners->lastPage()) as $page => $url)
                            @if ($page == $partners->currentPage())
                                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach

                        @if ($partners->hasMorePages())
                            <li class="page-item"><a class="page-link" href="{{ $partners->nextPageUrl() }}">Next</a></li>
                        @else
                            <li class="page-item disabled"><span class="page-link">Next</span></li>
                        @endif
                    </ul>
                </div>
            </div>
        
        </div>
    </div>
</div>

{{-- SweetAlert sukses --}}
@if(session('success'))
<script>
        Swal.fire({
            icon: "success",
            title: "Berhasil",
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2000
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
