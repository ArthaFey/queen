@extends('backend.template.index')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h3>Edit Sertifikat</h3>
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

            <form action="{{ route('sertifikat.update', $sertifikat->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Judul sertifikat -->
               <!-- Judul sertifikat -->
<div class="mb-3">
    <label for="alt" class="form-label">Judul sertifikat</label>
    <input type="text" name="alt" id="alt" class="form-control" 
           value="{{ old('alt', $sertifikat->alt) }}" required>
</div>

<!-- Upload + Preview -->
<div class="border rounded p-3 mb-4">
    <div class="row g-4 align-items-start">
        <!-- Upload File (kiri) -->
        <div class="col-md-4">
            <label for="src" class="form-label">Upload Gambar</label>
            <input type="file" name="src" class="form-control" accept="image/*" id="image-input">
        </div>

        <!-- Preview (kanan) -->
        <div class="col-md-8">
            <div class="row g-4">
                @if($sertifikat->src)
                <div class="col-md-6">
                    <div class="card shadow-sm h-100">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <img id="current-image" 
                                 src="{{ asset('storage/' . $sertifikat->src) }}" 
                                 alt="Gambar Saat Ini" 
                                 class="img-fluid rounded"
                                 style="max-height: 180px; object-fit: contain;">
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
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <img id="image-preview" 
                                 src="" 
                                 alt="Preview Gambar"
                                 class="img-fluid rounded"
                                 style="max-height: 180px; object-fit: contain; display:none;">
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
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Simpan
                </button>
                <a href="{{ route('sertifikat.index') }}" class="btn btn-secondary">
                    <i class="bi bi-x-circle"></i> Batal
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
<script>
document.addEventListener('DOMContentLoaded', function() {
    const imageInput = document.getElementById('image-input');
    const imagePreview = document.getElementById('image-preview');

    if (imageInput) {
        imageInput.addEventListener('change', function(event){
            const file = event.target.files[0];
            if(file){
                imagePreview.src = URL.createObjectURL(file);
                imagePreview.style.display = 'block'; 
            } else {
                imagePreview.src = '';
                imagePreview.style.display = 'none';
            }
        });
    }
});
</script>

