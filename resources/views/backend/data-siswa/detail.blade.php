@extends('backend.template.index')
@section('content')

  <section class="flex-grow bg-white py-12">
    <div class="max-w-2xl mx-auto px-4">
      <div class="border rounded-xl shadow-xl bg-white p-8">
          <!-- Input Fields -->
          <div class="border rounded-lg p-4">
            <label class="block text-sm font-semibold mb-1">Nama Lengkap</label>
            <p class="w-full border-none focus:outline-none text-gray-700 placeholder-gray-400 text-sm">{{ $data->nama }}</p>
          </div>

          <div class="border rounded-lg p-4">
            <label class="block text-sm font-semibold mb-1">Asal Sekolah</label>
            <p class="w-full border-none focus:outline-none text-gray-700 placeholder-gray-400 text-sm">{{ $data->asal_sekolah }}</p>
          </div>

          <div class="border rounded-lg p-4">
            <label class="block text-sm font-semibold mb-1">Nomor Whatsapp</label>
            <p class="w-full border-none focus:outline-none text-gray-700 placeholder-gray-400 text-sm">{{ $data->no_wa }}</p>
          </div>

          <div class="border rounded-lg p-4">
            <label class="block text-sm font-semibold mb-1">Nomor Orang Tua</label>
            <p class="w-full border-none focus:outline-none text-gray-700 placeholder-gray-400 text-sm">{{ $data->no_ortu }}</p>

          </div>

          <!-- Dropdown: Jurusan -->
          <div class="border rounded-lg p-4">
            <label class="block text-sm font-semibold mb-1">Jurusan Yang Hendak Dipilih</label>
            <p class="w-full border-none focus:outline-none text-gray-700 placeholder-gray-400 text-sm">{{ $data->jurusan }}</p>
          </div>

          <div class="border rounded-lg p-4">
            <label class="block text-sm font-semibold mb-1">Umur</label>
            <p class="w-full border-none focus:outline-none text-gray-700 placeholder-gray-400 text-sm">{{ $data->umur }}</p>

          </div>

          <div class="border rounded-lg p-4">
            <label class="block text-sm font-semibold mb-1">Pendidikan Terakhir</label>
            <p class="w-full border-none focus:outline-none text-gray-700 placeholder-gray-400 text-sm">{{ $data->pendidikan_terakhir }}</p>
          </div>

          <div class="border rounded-lg p-4">
            <label class="block text-sm font-semibold mb-1">Asal SMA/SMK</label>
            <p class="w-full border-none focus:outline-none text-gray-700 placeholder-gray-400 text-sm">{{ $data->asal_sma_smk }}</p>
          </div>

          <div class="border rounded-lg p-4">
            <label class="block text-sm font-semibold mb-1">Referal</label>
            <p class="w-full border-none focus:outline-none text-gray-700 placeholder-gray-400 text-sm">{{ $data->referal }}</p>
          </div>

          <!-- Dropdown: Sumber -->
          <div class="border rounded-lg p-4">
            <label class="block text-sm font-semibold mb-1">Mengetahui dari mana?</label>
            <p class="w-full border-none focus:outline-none text-gray-700 placeholder-gray-400 text-sm">{{ $data->mengetahui_darimana }}</p>
          </div>

         
        
      </div>
    </div>
  </section>

@endsection