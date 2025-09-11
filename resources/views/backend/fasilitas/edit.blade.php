@extends('backend.template.index')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header">
            <h3 class="fw-semibold mb-0">Edit Fasilitas</h3>
        </div>

        <div class="card-body">
            <!-- Error Validation -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form Update -->
            <form action="{{ route('fasilitas.update', $fasilitas->id) }}" 
                  method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Judul -->
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Fasilitas</label>
                    <input type="text" 
                           name="title" 
                           id="title" 
                           class="form-control" 
                           value="{{ old('title', $fasilitas->title) }}" 
                           required>
                </div>

                <!-- Deskripsi -->
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" 
                              id="deskripsi" 
                              class="form-control" 
                              rows="5" 
                              required>{{ old('deskripsi', $fasilitas->deskripsi) }}</textarea>
                </div>

                <!-- Upload & Preview -->
                <div class="border rounded p-3 mb-4">
                    <div class="row g-4 align-items-start">
                        <!-- Input Upload -->
                        <div class="col-md-4">
                            <label for="image" class="form-label">Upload Gambar</label>
                            <input type="file" 
                                   name="image" 
                                   id="image-input" 
                                   class="form-control" 
                                   accept="image/*">
                        </div>

                        <!-- Preview -->
                        <div class="col-md-8">
                            <div class="row g-4">
                                <!-- Gambar Lama -->
                                @if($fasilitas->image)
                                <div class="col-md-6">
                                    <div class="card shadow-sm h-100">
                                        <div class="card-body preview-wrapper">
                                            <img id="current-image" 
                                                 src="{{ asset('storage/' . $fasilitas->image) }}" 
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
                                                 src="" 
                                                 alt="Preview Gambar"
                                                 class="img-fluid rounded preview-img"
                                                 style="display:none;">
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

                <!-- Tombol -->
                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                    <a href="{{ route('fasilitas.index') }}" class="btn btn-secondary">
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

    imageInput.addEventListener('change', function(event){
        const [file] = event.target.files;
        if(file){
            imagePreview.style.display = 'block';
            imagePreview.src = URL.createObjectURL(file);
        } else {
            imagePreview.style.display = 'none';
            imagePreview.src = '';
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
    padding: 8px;
}
/* Card wrapper seragam */
.preview-wrapper {
    height: 220px;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 15px;
}
</style>
@endsection
