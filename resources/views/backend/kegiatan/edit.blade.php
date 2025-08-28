@extends('backend.template.index')
@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h3>Edit Kegiatan</h3>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('kegiatan.update', $kegiatan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Judul Kegiatan -->
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Kegiatan</label>
                    <input type="text" name="title" id="title" class="form-control" 
                           value="{{ old('title', $kegiatan->title) }}" required>
                </div>

                <!-- Deskripsi -->
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="5" required>{{ old('deskripsi', $kegiatan->deskripsi) }}</textarea>
                </div>

                <!-- Upload + Preview -->
                <div class="border rounded p-3 mb-4">
                    <div class="row g-4 align-items-start">
                        <!-- Upload File (kiri) -->
                        <div class="col-md-4">
                            <label for="image" class="form-label">Upload Gambar</label>
                            <input type="file" name="image" class="form-control" accept="image/*" id="image-input">
                        </div>

                        <!-- Preview (kanan, 2 card) -->
                        <div class="col-md-8">
                            <div class="row g-4">
                                <!-- Gambar Saat Ini -->
                                @if($kegiatan->image)
                                <div class="col-md-6">
                                    <div class="card shadow-sm h-100">
                                        <div class="card-body preview-wrapper">
                                            <img id="current-image" 
                                                 src="{{ asset('storage/' . $kegiatan->image) }}" 
                                                 alt="Gambar Saat Ini" 
                                                 class="img-fluid rounded preview-img">
                                        </div>
                                        <div class="card-footer text-center">
                                            <h6 class="mb-0">Gambar Saat Ini</h6>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <!-- Gambar Baru -->
                                <div class="col-md-6">
                                    <div class="card shadow-sm h-100">
                                        <div class="card-body preview-wrapper">
                                            <img id="image-preview" 
                                                 src="{{ $kegiatan->image ? asset('storage/' . $kegiatan->image) : '' }}" 
                                                 alt="Preview Gambar"
                                                 class="img-fluid rounded preview-img"
                                                 style="{{ $kegiatan->image ? '' : 'display:none;' }}">
                                        </div>
                                        <div class="card-footer text-center">
                                            <h6 class="mb-0">Gambar Baru</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tombol Update / Batal -->
                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                    <a href="{{ route('kegiatan.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const imageInput = document.getElementById('image-input');
    const imagePreview = document.getElementById('image-preview');
    const currentImage = document.getElementById('current-image');

    imageInput.addEventListener('change', function(event){
        const [file] = event.target.files;
        if(file){
            imagePreview.style.display = 'block';
            imagePreview.src = URL.createObjectURL(file);
        } else {
            if(currentImage){
                imagePreview.src = currentImage.src;
            } else {
                imagePreview.src = '';
                imagePreview.style.display = 'none';
            }
        }
    });
});
</script>

<style>
    /* Styling gambar preview */
    .preview-img {
        max-height: 180px;
        max-width: 100%;
        object-fit: contain;
        padding: 8px; /* jarak biar tidak nabrak */
    }

    /* Biar card preview seragam dan lega */
    .preview-wrapper {
        height: 220px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 15px;
    }
</style>
@endsection
