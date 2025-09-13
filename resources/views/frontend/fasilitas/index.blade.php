@extends('frontend.homepage.main')
@section('content')



<!-- Content -->
<main class="pt-28 space-y-16">

  @foreach ($fasilitas as $index => $data )

  @if ($loop->index % 2 !== 0)
  
  <section class="flex flex-col md:flex-row items-center py-2">
    <div class="md:w-1/2 w-full p-6 text-center md:text-left space-y-4">
      <h2 class="text-3xl font-bold text-orange-500">{{ $data->title }}</h2>
      <p class="text-gray-700">{!! Str::limit($data->deskripsi, 50, '...') !!}</p>
      <a href="{{ route('detailFasilitas',$data->id) }}" class="text-orange-600 underline font-medium">Detail</a>
    </div>
    <div class="md:w-1/2 w-full">
      <img src="{{ asset('storage/' . $data->image) }}" alt="Hotel" class="w-full h-64 md:h-full object-cover rounded-xl md:rounded-l-[500px]" />
    </div>
  </section>


  @elseif($loop->index % 2 === 0)

  <section class="flex flex-col md:flex-row-reverse items-center py-2">
    <div class="md:w-1/2 w-full p-6 text-center md:text-left space-y-4">
     <h2 class="text-3xl font-bold text-orange-500">{{ $data->title }}</h2>
      <p class="text-gray-700">{!! Str::limit($data->deskripsi, 50, '...') !!}</p>
      <a href="{{ route('detailFasilitas',$data->id) }}" class="text-orange-600 underline font-medium">Detail</a>
    </div>
    <div class="md:w-1/2 w-full">
      <img src="{{ asset('storage/' . $data->image) }}" alt="Kelas" class="w-full h-64 md:h-full object-cover rounded-xl md:rounded-r-[500px]" />
    </div>
  </section>
</main>


@endif


@endforeach




@endsection