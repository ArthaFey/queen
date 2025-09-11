@extends('backend.template.index')

<style>
    /* Styling gambar preview */
    .preview-img {
        max-height: 260px;
        max-width: 100%;
        object-fit: contain;
        padding: 8px; /* jarak biar tidak nabrak */
    }

    /* Biar card preview seragam dan lega */
    .preview-wrapper {
        height: 320px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 15px;
    }
</style>

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header">
            <h3 >Edit Program</h3>
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

            <form action="{{ route('program.update', $program->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Judul program -->
                <div class="mb-3">
                    <label for="alt" class="form-label">Judul</label>
                    <input type="text" name="alt" id="alt" class="form-control" 
                           value="{{ old('alt', $program->alt) }}" required>
                </div>

                <!-- Deskripsi -->
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="5" required>{{ old('deskripsi', $program->deskripsi) }}</textarea>
                </div>

                <!-- Upload Gambar & Preview -->
                <div class="mb-3">
    <label for="src" class="form-label">Upload Gambar</label>
    <div class="row g-3 align-items-start">
        <!-- Input file -->
        <div class="col-md-4 d-flex flex-column align-items-center">
            <input type="file" name="src" id="src" class="form-control" accept="image/*" style="height:48px;">
        </div>
        <!-- Gambar Saat Ini -->
        <div class="col-md-4 d-flex flex-column align-items-center">
            @if($program->src)
                <div class="border rounded shadow-sm p-2 bg-white preview-wrapper" style="width: 320px; min-height: 260px; display:flex; flex-direction:column; align-items:center;">
                    <img id="current-image" src="{{ asset('storage/' . $program->src) }}" alt="{{ $program->alt }}" class="preview-img">
                    <div class="text-center mt-2" style="font-size:15px; color:#555;">Gambar Saat Ini</div>
                </div>
            @endif
        </div>
        <!-- Preview Gambar Baru -->
        <div class="col-md-4 d-flex flex-column align-items-center">
            <div class="border rounded shadow-sm p-2 bg-white preview-wrapper" style="width: 320px; min-height: 260px; display:flex; flex-direction:column; align-items:center;">
                <img id="image-preview" src="#" alt="Preview Gambar" class="preview-img" style="display:none;">
                <div class="text-center mt-2" style="font-size:15px; color:#555;">Gambar Baru</div>
            </div>
        </div>
    </div>
</div>

                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="{{ route('program.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Batal
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
    const srcInput = document.getElementById('src');
    const imagePreview = document.getElementById('image-preview');

    srcInput.addEventListener('change', function(event){
        const [file] = event.target.files;
        const labelPreview = document.getElementById('preview-label');
        if(file){
            imagePreview.src = URL.createObjectURL(file);
            imagePreview.style.display = 'block';
            if(labelPreview) labelPreview.style.display = 'inline';
        } else {
            imagePreview.src = '#';
            imagePreview.style.display = 'none';
            if(labelPreview) labelPreview.style.display = 'none';
        }
    });
});
</script>
@endsection