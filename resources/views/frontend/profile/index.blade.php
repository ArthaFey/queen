@extends('frontend.homepage.main')
@section('content')


<!-- Judul Section -->
<section class="bg-black py-6">
  <div class="max-w-7xl mx-auto px-4">
    <h1 class="text-white text-xl sm:text-2xl font-bold uppercase">PROFILE</h1>
  </div>
</section>

<!-- Hero Section -->
<section class="py-16 px-4">
  <div class="text-center">
    <img src="images/LOGO FULL.png" alt="Logo Queen" class="h-40 sm:h-44 mx-auto mb-6" />
    <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold tracking-wide uppercase">CERITA KAMPUS QUEEN INTERNATIONAL</h1>
    <div class="flex justify-center mt-4 space-x-10 text-sm text-gray-600">
      <div>
        <p class="text-2xl font-semibold text-orange-500">74</p>
        <p>Dosen</p>
      </div>
      <div>
        <p class="text-2xl font-semibold text-orange-500">4</p>
        <p>Cabang</p>
      </div>
    </div>
  </div>

  <div class="max-w-4xl mx-auto mt-10">
    <img src="images/about.png" alt="Foto Kampus" class="w-full h-64 sm:h-[400px] object-cover rounded-lg mb-8" />
    <figure class="text-center italic text-gray-700 text-base px-4 max-w-3xl mx-auto mb-8">
      <blockquote>“Selamat datang di rumah kedua kalian...”</blockquote>
      <figcaption class="mt-2 font-semibold text-gray-500">- Founder Queen International</figcaption>
    </figure>

    <div class="space-y-6 text-sm text-gray-700 leading-relaxed px-2 sm:px-4">
       <div class="space-y-6 text-sm text-gray-700 leading-relaxed">
      <p>Queen International adalah lembaga pendidikan vokasi yang berfokus pada bidang hospitality, perhotelan, dan pelatihan kerja kapal pesiar. Berdiri dengan komitmen kuat untuk mencetak generasi profesional unggul, kami menawarkan pengalaman belajar berbasis praktik, lingkungan akademik yang kondusif, serta dukungan langsung dari para mentor berpengalaman di industri.</p>
      <p>Selama bertahun-tahun, Queen International telah dipercaya oleh ratusan siswa dan orang tua sebagai tempat terbaik untuk mengembangkan keahlian dan karakter. Kami merancang kurikulum secara holistik yang tidak hanya menekankan pada kompetensi teknis, tetapi juga pada penguatan karakter, sikap profesional, dan keterampilan komunikasi global.</p>
      <p>Dengan jaringan mitra industri internasional, lulusan kami telah tersebar di berbagai negara sebagai bukti nyata bahwa Queen International adalah pintu menuju dunia kerja global.</p>
      <p>Kami menawarkan program seperti Food and Beverage Service, Housekeeping, Front Office, serta Pelatihan Bahasa Inggris dan Jepang intensif. Semua program didukung fasilitas modern dan simulasi kerja nyata.</p>
      <p>Metode pembelajaran kami adalah "learning by doing" yang menempatkan mahasiswa dalam situasi kerja riil di hotel bintang lima, kapal pesiar, maupun lembaga hospitality internasional.</p>
      <p>Para pengajar di Queen International adalah praktisi berpengalaman dari industri nasional dan internasional yang tidak hanya mengajar teori, tetapi juga membimbing langsung.</p>
      <p>Kami juga aktif mengembangkan soft skill dan leadership siswa melalui seminar, workshop, organisasi, dan pelatihan intensif.</p>
      <p>Dengan visi menjadi pusat pendidikan hospitality terbaik di Indonesia, Queen International terus berkembang dan berinovasi untuk memberikan pendidikan terbaik.</p>
    </div>
    </div>
  </div>
</section>

<!-- Para Pengajar -->
<section class="bg-white py-16 px-4">
  <div class="max-w-6xl mx-auto">
    <h3 class="text-center text-xl font-bold uppercase mb-12">Para Pengajar</h3>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-8 justify-items-center">
     <!-- Ulangi div ini sesuai jumlah pengajar -->
      <div class="flex flex-col items-center space-y-3">
        <img src="images/orang.png" alt="Pengajar" class="w-24 h-24 rounded-full object-cover">
        <p class="text-xs font-semibold text-center">Nama Pengajar</p>
        <p class="text-[10px] text-gray-500 text-center">SST.Par, CHE</p>
      </div>
      <div class="flex flex-col items-center space-y-3">
        <img src="images/orang.png" alt="Pengajar" class="w-24 h-24 rounded-full object-cover">
        <p class="text-xs font-semibold text-center">Nama Pengajar</p>
        <p class="text-[10px] text-gray-500 text-center">SST.Par, CHE</p>
      </div>
      <div class="flex flex-col items-center space-y-3">
        <img src="images/orang.png" alt="Pengajar" class="w-24 h-24 rounded-full object-cover">
        <p class="text-xs font-semibold text-center">Nama Pengajar</p>
        <p class="text-[10px] text-gray-500 text-center">SST.Par, CHE</p>
      </div>
      <div class="flex flex-col items-center space-y-3">
        <img src="images/orang.png" alt="Pengajar" class="w-24 h-24 rounded-full object-cover">
        <p class="text-xs font-semibold text-center">Nama Pengajar</p>
        <p class="text-[10px] text-gray-500 text-center">SST.Par, CHE</p>
      </div>
      <div class="flex flex-col items-center space-y-3">
        <img src="images/orang.png" alt="Pengajar" class="w-24 h-24 rounded-full object-cover">
        <p class="text-xs font-semibold text-center">Nama Pengajar</p>
        <p class="text-[10px] text-gray-500 text-center">SST.Par, CHE</p>
      </div>
      <div class="flex flex-col items-center space-y-3">
        <img src="images/orang.png" alt="Pengajar" class="w-24 h-24 rounded-full object-cover">
        <p class="text-xs font-semibold text-center">Nama Pengajar</p>
        <p class="text-[10px] text-gray-500 text-center">SST.Par, CHE</p>
      </div>
      <div class="flex flex-col items-center space-y-3">
        <img src="images/orang.png" alt="Pengajar" class="w-24 h-24 rounded-full object-cover">
        <p class="text-xs font-semibold text-center">Nama Pengajar</p>
        <p class="text-[10px] text-gray-500 text-center">SST.Par, CHE</p>
      </div>
      <div class="flex flex-col items-center space-y-3">
        <img src="images/orang.png" alt="Pengajar" class="w-24 h-24 rounded-full object-cover">
        <p class="text-xs font-semibold text-center">Nama Pengajar</p>
        <p class="text-[10px] text-gray-500 text-center">SST.Par, CHE</p>
      </div>

    </div>
  </div>
</section>


@endsection