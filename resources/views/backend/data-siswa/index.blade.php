@extends('backend.template.index')
@section('content')

@php
use Carbon\Carbon;

@endphp
<div class="container">
    <!-- Judul di luar card -->
    <div class="mb-3 mt-2">
        <h3 style="margin: 0 0 20px 6px; font-weight: normal; font-size: 1.4rem;">
            Daftar Kegiatan
        </h3>
    </div>

    <div class="card mt-2">
        <div class="card-header d-flex flex-wrap align-items-center gap-3">
         

            <!-- Search -->
            <form action="{{ route('pendaftaran.index.backend') }}" method="GET" class="d-flex align-items-center ms-auto" style="flex:0 0 auto;">
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
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th style="width: 150px" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $key => $item)
                        <tr>
                            <td>{{ $data->firstItem() + $key }}.</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ Carbon::parse($item->created_at)->isoFormat('D MMMM Y') }}</td>
                         
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <a href="{{ route('pendaftaran.detail', $item->id) }}" class="btn btn-sm btn-warning d-flex align-items-center gap-1">
                                        <i class="bi bi-pencil-square"></i> <span>Detail</span>
                                    </a>
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
                Menampilkan {{ $data->firstItem() }}–{{ $data->lastItem() }} dari {{ $data->total() }} data
            </div>
            <div style="margin-left:auto; margin-right:0;">
                <ul class="pagination mb-0">
                    @if ($data->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">Previous</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $data->previousPageUrl() }}">Previous</a></li>
                    @endif

                    @foreach ($data->getUrlRange(1, $data->lastPage()) as $page => $url)
                        @if ($page == $data->currentPage())
                            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach

                    @if ($data->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $data->nextPageUrl() }}">Next</a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link">Next</span></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
