@extends('frontend.homepage.main')
@section('content')


 <!-- Formulir Pendaftaran Mahasiswa -->
  <section class="flex-grow bg-white py-12">
    <div class="max-w-2xl mx-auto px-4">
      <div class="border rounded-xl shadow-xl bg-white p-8">
        <h2 class="text-2xl font-bold mb-6 border-l-8 pl-3 uppercase text-gray-800" style="border-color: #FFA500;">
          Pendaftaran Mahasiswa
        </h2>

        <form action="{{ route('pendaftaran.insert') }}" method="POST" class="space-y-4">
          @csrf
          <!-- Input Fields -->
          <div class="border rounded-lg p-4">
            <label class="block text-sm font-semibold mb-1">Nama Lengkap</label>
            <input type="text" name="nama" placeholder="Jawaban Anda" class="w-full border-none focus:outline-none text-gray-700 placeholder-gray-400 text-sm" required />
          </div>

          <div class="border rounded-lg p-4">
            <label class="block text-sm font-semibold mb-1">Asal Sekolah</label>
            <input type="text" name="asal_sekolah" placeholder="Jawaban Anda" class="w-full border-none focus:outline-none text-gray-700 placeholder-gray-400 text-sm" required />
          </div>

          <div class="border rounded-lg p-4">
            <label class="block text-sm font-semibold mb-1">Nomor Whatsapp</label>
            <input type="tel" name="no_wa" placeholder="Jawaban Anda" class="w-full border-none focus:outline-none text-gray-700 placeholder-gray-400 text-sm" required />
          </div>

          <div class="border rounded-lg p-4">
            <label class="block text-sm font-semibold mb-1">Nomor Orang Tua</label>
            <input type="text" name="no_ortu" placeholder="Jawaban Anda" class="w-full border-none focus:outline-none text-gray-700 placeholder-gray-400 text-sm" required />
          </div>

          <!-- Dropdown: Jurusan -->
          <div class="border rounded-lg p-4">
            <label class="block text-sm font-semibold mb-1">Jurusan Yang Hendak Dipilih</label>
            <select name="jurusan" class="w-full border-none focus:outline-none bg-transparent text-gray-700 text-sm" required>
              <option value="" disabled selected hidden class="text-gray-400">Pilih</option>
              <option value="FNB PRODUCT">FNB PRODUCT</option>
              <option value="FNB SERVICE">FNB SERVICE</option>
              <option value="HOUSEKEEPING">HOUSEKEEPING</option>
              <option value="FRONT OFFICE">FRONT OFFICE</option>
            </select>
          </div>

          <div class="border rounded-lg p-4">
            <label class="block text-sm font-semibold mb-1">Umur</label>
            <input type="number" name="umur" placeholder="Jawaban Anda" class="w-full border-none focus:outline-none text-sm" required />
          </div>

          <div class="border rounded-lg p-4">
            <label class="block text-sm font-semibold mb-1">Pendidikan Terakhir</label>
            <input type="text" name="pendidikan_terakhir" placeholder="Jawaban Anda" class="w-full border-none focus:outline-none text-sm" required />
          </div>

          <div class="border rounded-lg p-4">
            <label class="block text-sm font-semibold mb-1">Asal SMA/SMK</label>
            <input type="text" name="asal_sma_smk" placeholder="Jawaban Anda" class="w-full border-none focus:outline-none text-sm" required />
          </div>

          <div class="border rounded-lg p-4">
            <label class="block text-sm font-semibold mb-1">Referal</label>
            <input type="text" name="referal" placeholder="Jawaban Anda" class="w-full border-none focus:outline-none text-sm" />
          </div>

          <!-- Dropdown: Sumber -->
          <div class="border rounded-lg p-4">
            <label class="block text-sm font-semibold mb-1">Mengetahui dari mana?</label>
            <select name="mengetahui_darimana" class="w-full border-none focus:outline-none bg-transparent text-sm">
              <option value="" disabled selected hidden>Pilih</option>
              <option value="Instagram">Instagram</option>
              <option value="Facebook">Facebook</option>
              <option value="Tiktok">Tiktok</option>
              <option value="teman, kolega, teman, dan lainnya">Teman, kolega, dan lainnya</option>
            </select>
          </div>

          <!-- Tombol -->
          <div class="flex justify-between gap-4 mt-4">
            <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-6 rounded-full">Kirim</button>
            <button type="reset" class="bg-blue-700 hover:bg-blue-800 text-white font-semibold py-2 px-6 rounded-full">Kosongkan formulir</button>
          </div>
        </form>
      </div>
    </div>
  </section>

@endsection