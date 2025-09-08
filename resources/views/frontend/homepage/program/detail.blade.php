@extends('frontend.homepage.main')
@section('content')
<!-- Banner Section -->
<section class="relative w-full bg-white py-10">
  <img src="{{ asset('storage/'. $detailProgram['src']) }}" alt="Banner"
       class="w-full h-[250px] sm:h-[350px] object-cover object-[center_25%]" />

  <!-- Konten detailProgram -->
  <div class="w-full mx-auto max-w-5xl  bg-white shadow-md rounded-lg p-8 mt-3 z-10">
    <h2 class="text-center font-bold text-base sm:text-lg mb-6">
      {{ $detailProgram['alt'] }}
    </h2>

    <div class="mb-4">


    <div class=" text-sm mb-1">
        <p>{!! $detailProgram['deskripsi'] !!}</p>
    </div>  
    


    <div class="text-center mt-10">
      <a href="#" class="bg-orange-500 hover:bg-orange-600 text-white text-sm px-6 py-3 rounded-full font-semibold">
        DAFTAR SEKARANG
      </a>
    </div>
  </div>
</section>


@endsection