@extends('backend.template.index')

@section('styles')
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
    max-width: 250px;
    max-height: 180px;
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
    <div class="card">
        <div class="card-header">
            <h3>Tambah Kegiatan</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Judul Kegiatan -->
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Kegiatan</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                </div>

                <!-- Deskripsi pakai Summernote -->
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control">{{ old('deskripsi') }}</textarea>
                </div>

                <!-- Upload Gambar dalam Card -->
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar</label>
                    <div class="card p-3 shadow-sm">
                        <div class="row g-3 align-items-center">
                            <!-- Input file -->
                            <div class="col-md-6">
                                <input type="file" name="image" class="form-control" accept="image/*" id="image-input">
                            </div>
                            <!-- Preview (digeser ke kanan) -->
                            <div class="col-md-6 d-flex justify-content-end">
                                <img id="image-preview" src="" alt="Preview Gambar">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tombol -->
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Simpan
                </button>
                <a href="{{ route('kegiatan.index') }}" class="btn btn-secondary">
                    <i class="bi bi-x-circle"></i> Batal
                </a>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- jQuery (dibutuhkan Summernote) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Summernote Lite JS -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>

<script>
$(document).ready(function() {
    // Init Summernote
    $('#deskripsi').summernote({
        placeholder: 'Tulis deskripsi kegiatan di sini...',
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
            $('#image-preview').attr('src', URL.createObjectURL(file)).show();
        }
    });
});
</script>
@endsection
