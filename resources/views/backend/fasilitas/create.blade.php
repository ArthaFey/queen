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
#image-preview {
    display: none;
    width: 100%;
    max-width: 220px;
    max-height: 160px;
    border: 1px solid #ddd;
    padding: 5px;
    border-radius: 6px;
    box-shadow: 0 1px 4px rgba(0,0,0,0.1);
    object-fit: cover;
}
</style>
@endsection

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header">
            <h3 class="mb-0">Tambah Fasilitas</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('fasilitas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Judul fasilitas -->
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Fasilitas</label>
                    <input type="text" name="title" id="title" 
                           class="form-control @error('title') is-invalid @enderror" 
                           value="{{ old('title') }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Deskripsi pakai Summernote -->
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" 
                              class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Upload Gambar -->
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar</label>
                    <div class="card p-3">
                        <div class="row g-3 align-items-center">
                            <!-- Input file -->
                            <div class="col-md-6">
                                <input type="file" name="image" id="image-input" 
                                       class="form-control @error('image') is-invalid @enderror" 
                                       accept="image/*">
                                @error('image')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Preview -->
                            <div class="col-md-6 text-center">
                                <img id="image-preview" src="" alt="Preview Gambar">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tombol -->
                <div class="d-flex justify-content-start gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                    <a href="{{ route('fasilitas.index') }}" class="btn btn-secondary">
                        <i class="bi bi-x-circle"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Summernote Lite JS -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>

<script>
$(document).ready(function() {
    // Init Summernote
    $('#deskripsi').summernote({
        placeholder: 'Tulis deskripsi fasilitas di sini...',
        height: 250,
        toolbar: [
            ['style', ['style', 'bold', 'italic', 'underline', 'clear']],
            ['font', ['fontsize', 'color', 'highlight']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview']]
        ],
        styleTags: ['p', 'blockquote', 'h3', 'h4'],
        fontSizes: ['10','12','14','16','18','20','24','28'],
    });

    // Preview gambar
    $('#image-input').on('change', function(e) {
        const [file] = e.target.files;
        if(file){
            $('#image-preview').attr('src', URL.createObjectURL(file)).fadeIn();
        }
    });
});
</script>
@endsection
