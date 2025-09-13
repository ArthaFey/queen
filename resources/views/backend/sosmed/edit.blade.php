@extends('backend.template.index')
@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h3>Edit Sosmed</h3>
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

            <form action="{{ route('sosmed.update', $sosmed->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')


                 <div class="mb-3">
                    <label for="link" class="form-label">Nama Media Sosial</label>
                    <input type="text" name="name" value="{{ old('name',$sosmed->name) }}" class="form-control" 
                          placeholder="Masukan Nama Media Sosial..." required>
                </div>

                <!-- Link Sosmed -->
                <div class="mb-3">
                    <label for="link" class="form-label">Link Sosmed</label>
                    <input type="url" name="link" id="link" class="form-control" 
                           value="{{ old('link', $sosmed->link) }}" required>
                </div>

                <!-- Warna -->
                <div class="mb-3">
                    <label for="color" class="form-label">Warna</label>
                    <input type="color" name="color" id="color" class="form-control form-control-color" 
                           value="{{ old('color', $sosmed->color) }}" title="Pilih Warna">
                </div>

                <!-- Upload + Preview -->
                <div class="border rounded p-3 mb-4">
                    <div class="row g-4 align-items-start">
                        <!-- Upload File (kiri) -->
                        <div class="col-md-4">
                            <label for="image" class="form-label">Upload Icon/Gambar</label>
                            <input type="file" name="image" class="form-control" accept="image/*" id="image-input">
                        </div>

                        <!-- Preview (kanan, 2 card) -->
                        <div class="col-md-8">
                            <div class="row g-4">
                                <!-- Gambar Saat Ini -->
                                @if($sosmed->image)
                                <div class="col-md-6">
                                    <div class="card shadow-sm h-100">
                                        <div class="card-body preview-wrapper">
                                            <img id="current-image" 
                                                 src="{{ asset('storage/' . $sosmed->image) }}" 
                                                 alt="Icon Saat Ini" 
                                                 class="img-fluid rounded preview-img">
                                        </div>
                                        <div class="card-footer text-center">
                                            <h6 class="mb-0">Icon Saat Ini</h6>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <!-- Gambar Baru -->
                                <div class="col-md-6">
                                    <div class="card shadow-sm h-100">
                                        <div class="card-body preview-wrapper">
                                            <img id="image-preview" 
                                                 src="{{ $sosmed->image ? asset('storage/' . $sosmed->image) : '' }}" 
                                                 alt="Preview Icon"
                                                 class="img-fluid rounded preview-img"
                                                 style="{{ $sosmed->image ? '' : 'display:none;' }}">
                                        </div>
                                        <div class="card-footer text-center">
                                            <h6 class="mb-0">Icon Baru</h6>
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
                    <a href="{{ route('sosmed.index') }}" class="btn btn-secondary">
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
    .preview-img {
        max-height: 150px;
        max-width: 100%;
        object-fit: contain;
        padding: 8px;
    }
    .preview-wrapper {
        height: 200px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 15px;
    }
</style>
@endsection
