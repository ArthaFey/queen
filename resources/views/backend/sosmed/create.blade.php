@extends('backend.template.index')

@section('styles')
<style>
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
            <h3>Tambah Sosmed</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('sosmed.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                 <div class="mb-3">
                    <label for="link" class="form-label">Nama Media Sosial</label>
                    <input type="text" name="nama" class="form-control" 
                          placeholder="Masukan Nama Media Sosial..." required>
                </div>


                <!-- Link Sosmed -->
                <div class="mb-3">
                    <label for="link" class="form-label">Link Sosmed</label>
                    <input type="url" name="link" class="form-control" 
                           value="{{ old('link') }}" placeholder="link sosmed" required>
                </div>

                <!-- Warna -->
                <div class="mb-3">
                    <label for="color" class="form-label">Warna</label>
                    <input type="color" name="color" id="color" class="form-control form-control-color" 
                           value="{{ old('color', '#000000') }}" title="Pilih Warna">
                </div>

                <!-- Upload Icon dalam Card -->
                <div class="mb-3">
                    <label for="image" class="form-label">Icon/Gambar</label>
                    <div class="card p-3 shadow-sm">
                        <div class="row g-3 align-items-center">
                            <!-- Input file -->
                            <div class="col-md-6">
                                <input type="file" name="image" class="form-control" accept="image/*" id="image-input">
                            </div>
                            <!-- Preview (kanan) -->
                            <div class="col-md-6 d-flex justify-content-end">
                                <img id="image-preview" src="" alt="Preview Icon">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tombol -->
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Simpan
                </button>
                <a href="{{ route('sosmed.index') }}" class="btn btn-secondary">
                    <i class="bi bi-x-circle"></i> Batal
                </a>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    const input = document.getElementById('image-input');
    const preview = document.getElementById('image-preview');

    input.addEventListener('change', function(e){
        const [file] = e.target.files;
        if(file){
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        }
    });
});
</script>
@endsection
