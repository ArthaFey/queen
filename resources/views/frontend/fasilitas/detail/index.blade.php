@extends('frontend.homepage.main')
@section('content')

 <!-- judul -->
  <main class="max-w-7xl mx-auto px-4 py-8">
    <h2 class="text-2xl font-semibold mb-4"><h2 class="text-2xl font-semibold mb-4">
  <span class="text-orange-500">Bali Queen Internasional</span> Facilities
</h2>

    <div class="flex flex-col lg:flex-row gap-8">
      
      <!-- banner -->
      <div class="lg:w-3/4 space-y-4">
        <div class="bg-white rounded-lg overflow-hidden shadow">
          <img src="{{ asset('storage/' . $fasilitas->image) }}" alt="Main Facility" class="w-full h-auto">
        </div>
    <h4 class="text-lg font-medium">{{ $fasilitas->title }}</h4>
        <div class="text-sm leading-relaxed">
            <p>{!! $fasilitas->deskripsi !!}</p>
        </div>

      </div>

      <!-- Sidebar -->
<aside class="lg:w-1/4 flex flex-col gap-4">
  <!-- YouTube Box -->
  <div class="bg-white rounded-lg p-4 shadow">
    <h4 class="text-md font-semibold mb-2">YouTube</h4>
    <!-- Embedded YouTube Video -->
    <div class="w-full aspect-w-16 aspect-h-9">
      <iframe
        class="w-full h-48 rounded-lg"
        src="https://www.youtube.com/embed/dQw4w9WgXcQ"
        title="YouTube Video"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen>
      </iframe>
    </div>
  </div>

<!-- Fasilitas Alternating -->
<div class="bg-white rounded-lg p-4 shadow space-y-4">
  
    @foreach ($allFasilitas as $index => $data)     
    
        <div class="flex gap-4 items-start">
            <img src="{{ asset('storage/' . $data->image) }}" alt="Bar"
                class="rounded w-28 h-20 object-cover transform hover:scale-105 hover:shadow-lg transition duration-300 ease-in-out cursor-pointer">
            <div class="">
                <p class="text-sm"><strong>{{ $data->title }}</strong></p>
                <p>{!! Str::limit($data->deskripsi, 50, '...') !!}</p>
            </div>
        </div>

    @endforeach


</main>



@endsection