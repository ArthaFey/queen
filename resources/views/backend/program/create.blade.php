@extends('backend.template.index')

@section('styles')
<!-- Summernote Lite CSS -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
<style>
.note-editor {
    z-index: 1050; 
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}
.note-toolbar {
    background: #f8f9fa !important;
    border-bottom: 1px solid #e0e0e0 !important;
}
.note-editable {
    min-height: 200px;
    line-height: 1.6;
    font-size: 15px;
    padding: 15px;
}
    /* Preview gambar besar dan seragam dengan edit */
    .preview-img {
        max-height: 260px;
        max-width: 100%;
        object-fit: contain;
        padding: 8px;
    }
    .preview-wrapper {
        height: 320px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 15px;
    }
</style>
@endsection

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h3>Tambah Program</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('program.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="mb-3">
                    <label for="alt" class="form-label">Judul</label>
                    <input type="text" name="alt" class="form-control" value="{{ old('alt') }}" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" id="deskripsi">{{ old('deskripsi') }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="src" class="form-label">Upload Gambar</label>
                    <div class="row g-3 align-items-start">
                        <!-- Input file -->
                        <div class="col-md-4 d-flex flex-column align-items-center">
                            <input type="file" name="src" id="src" class="form-control" accept="image/*" style="height:48px;">
                        </div>
                        <!-- Preview Gambar Baru -->
                        <div class="col-md-4 d-flex flex-column align-items-center">
                            <div class="border rounded shadow-sm p-2 bg-white preview-wrapper" style="width: 320px; min-height: 260px; display:flex; flex-direction:column; align-items:center;">
                                <img id="image-preview" src="#" alt="Preview Gambar" class="preview-img" style="display:none;">
                                <div class="text-center mt-2" style="font-size:15px; color:#555;">Preview Gambar</div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
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
        if(file){
            imagePreview.src = URL.createObjectURL(file);
            imagePreview.style.display = 'block';
        } else {
            imagePreview.src = '#';
            imagePreview.style.display = 'none';
        }
    });
});
</script>
@endsection