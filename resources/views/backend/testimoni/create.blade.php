@extends('backend.template.index')
@section('content')

<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-lg">
        <div class="card-header">
            <h3 class="mb-0">Tambah Testimoni</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('testimoni.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="alt" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Review</label>
                    <textarea name="review" class="form-control" rows="4" required></textarea>
                </div>

                <!-- Upload Gambar dalam Card -->
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar</label>
                    <div class="card p-3 shadow-sm">
                        <div class="row g-3 align-items-center">
                            <!-- Input file -->
                            <div class="col-md-6">
                                <input type="file" name="src" class="form-control" id="gambar-input">
                            </div>
                            <!-- Preview (digeser ke kanan) -->
                            <div class="col-md-6 d-flex justify-content-end">
                            <img id="image-preview"
                                src=""
                                alt="Preview Gambar"
                                style="max-height:200px; max-width:100%; object-fit:contain; display:none;">
                             </div>
                        </div>
                    </div>
                </div>


                <!-- Tombol -->
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Simpan
                </button>
                <a href="{{ route('testimoni.index') }}" class="btn btn-secondary">
                    <i class="bi bi-x-circle"></i> Batal
                </a>

            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('gambar-input').addEventListener('change', function(e) {
    let file = e.target.files[0];
    let preview = document.getElementById('image-preview');
    if(file){
        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
    } else {
        preview.src = "";
        preview.style.display = "none";
    }
});
</script>


@endsection
