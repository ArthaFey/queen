@extends('frontend.homepage.main')
@section('content')

  <!-- Banner -->
    <section class="relative h-screen overflow-hidden pt-20" id="heroSection">
        <!-- Background Images Container -->
        <div class="absolute inset-0" id="bannerContainer">
            <!-- Dynamic background will be inserted here -->
        </div>
        
        <!-- Content Overlay -->
        <div class="relative z-10 h-full flex items-center">
            <div class="container mx-auto px-6">
                <div class="max-w-xl lg:ml-32">
                    <h1 class="ml-12 text-5xl lg:ml-0 lg:text-6xl font-bold text-white mb-4 leading-tight">
                        Selamat Datang<br>
                        <span class="text-orange-500">Queen</span>
                    </h1>
                </div>
            </div>
        </div>
        
        <!-- Navigation Arrows -->
        <button id="prevBanner" class="absolute left-6 top-1/2 transform -translate-y-1/2 w-12 h-12 bg-white bg-opacity-20 backdrop-blur-sm rounded-full flex items-center justify-center text-white text-2xl hover:bg-opacity-30 transition-all duration-300 z-20">
            ‹
        </button>
        <button id="nextBanner" class="absolute right-6 top-1/2 transform -translate-y-1/2 w-12 h-12 bg-white bg-opacity-20 backdrop-blur-sm rounded-full flex items-center justify-center text-white text-2xl hover:bg-opacity-30 transition-all duration-300 z-20">
            ›
        </button>

        <!-- Banner Indicators -->
        <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 flex space-x-2 z-20" id="bannerIndicators">
            <!-- Dynamic indicators will be inserted here -->
        </div>
    </section>


    <!-- Sertifikat and achivment -->
    <section class="w-full">
    <div class="mx-auto px-4 py-10 sm:px-6 lg:px-8">
        <div class="text-center mb-12 animate__animated animate__fadeIn">
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-center mb-8 md:mb-16 text-orange-500">Certificate & Achievements</h2>
        </div>

        <div class="swiper sertifikatSwiper w-full mx-auto">
            <div class="swiper-wrapper">
                <!-- Loop through the reviews and create individual slides for each review -->
                @foreach ($sertifikat as $sert)
                <div class="swiper-slide flex justify-center">
                    <!-- Review Card -->
                    <div class="">
                        <div class="mb-4 sm:mb-6">
                            <div class="flex items-center">
                                <img alt="" class=" mr-4 object-cover h-52" src="{{ asset('storage/'. $sert->src) }}">
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </section>





    <!-- Spacing Section -->
    <div class="py-2 bg-gradient-to-b from-gray-10 to-white"></div>





    <!-- Kegiatan Queen Section -->
   <section class="py-20 bg-white relative">
    <!-- Background image & overlay -->
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=1200&h=600&fit=crop"
            alt="Queen Background"
            class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-60"></div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-center mb-6 text-white">
            Kegiatan <span class="text-orange-500">Queen</span>
        </h2>
        
        <div class="activities-slider-container relative max-w-6xl mx-auto">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach ($kegiatan->chunk(6) as $chunk)
                        <div class="swiper-slide">
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach ($chunk as $ke)
                                    <div class="bg-white bg-opacity-90 backdrop-blur-sm rounded-lg overflow-hidden border border-white border-opacity-20 card-hover" data-aos="fade-up">
                                        <div class="h-40 sm:h-52 lg:h-56 bg-gray-200 bg-opacity-50">
                                            <img src="{{ asset('storage/' . $ke->image) }}" alt="{{ $ke->title }}" class="w-full h-full object-cover">
                                        </div>
                                        <div class="p-4 sm:p-6">
                                            <h3 class="text-base sm:text-lg font-semibold mb-2 text-gray-800">{{ $ke->title }}</h3>
                                            <p class="text-gray-700 text-sm leading-relaxed">{!! $ke->deskripsi !!}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    
    </section>

    






 
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-5xl font-bold text-orange-500">
               "Hospitality Management Campus"
            </h2>
        </div>
    </section>




     <!-- Pesan dari Pemilik -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="max-w-6xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="md:flex">
                    <div class="md:w-1/3 p-0 flex items-center justify-center">
                        <img src="image/homepage/owner/owner.png" 
                             alt="Founder" class="w-full rounded object-cover">
                    </div>
                    <div class="md:w-2/3 p-8">
                        <h3 class="text-4xl font-bold mb-6">
                            Warm Greeating <br>
                            <span class="text-orange-500">by The Founder & CEO Queen Internasional</span>
                        </h3>
                        <p class="text-gray-700 leading-relaxed text-lg">
                            Welcome to Queen Internasional the truly brand new campus, dengan dynamic dan innovative concept the center of excellent. <br><br>
                            Sebuah kampus sebagai rumah bertransformasi mengajak kalian bermimpi hebat, menggapai impian hebatmu, melakukan tindakan hebat demi cita,cinta,masa depan, yang gemilang.
                            Kampus yang menemanimu menemukan hasrat,membingkai hobby serta passion mu, menggelorakan semangat perjuangan sebagai landasan kuat berpijak untuk bersama - sama bergandengan tangan mengarungi samudra kasih kehidupan sebagai berkah dan karunia dari Tuhan yang maha kuasa patut untuk di syukuri.<br><br>
                            Congratulation for joining hospitality kampus terbaik jaman now.Congratulation to be a part of the Queeners Family.
                            
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    





    <!-- Partner -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="md:flex items-center max-w-6xl mx-auto">
                <div class="md:w-1/3 mb-8 md:mb-0 pr-8">
                    <h2 class="text-3xl font-bold mb-6">Partner</h2>
                    {{-- <p class="text-gray-600 text-sm leading-relaxed">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    </p> --}}
                </div>
                <div class="md:w-2/3">
                    <div class="overflow-hidden relative">
                        <div class="flex partner-slide items-center" id="partnerSlider">
                            
                            @foreach ($partner as  $part )                                
                                <div class="flex-shrink-0 rounded flex items-center justify-center mx-4">
                                    <img src="{{ asset('storage/'. $part->src) }}" class="h-20" alt="">
                                </div>
                            @endforeach

                        
                           
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>










    



    <!-- Program -->
    <section class="py-20 bg-white" id="program">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-center mb-16">PROGRAM STUDY</h2>
            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                
                @foreach ($program as $pro )
                    
                <div class="bg-white rounded-lg shadow-lg overflow-hidden" data-aos="zoom-in-up" data-aos-delay="100">
                    <img src="{{ asset('storage/' . $pro->src) }}" 
                         alt="Kapal Pesiar" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-2">{{ $pro->alt }}</h3>
                        <p class="text-gray-600 text-md mb-4">{!! Str::limit($pro->deskripsi, 100, '...') !!}</p>
                        <a href="{{ route('detail.program',$pro->id) }}" class="text-orange-500 font-semibold text-md hover:underline">Detail</a>
                    </div>
                </div>
        
                @endforeach

            </div>
        </div>
    </section>













    <!-- Fasilitas -->
    <section class="py-24 bg-gradient-to-br from-gray-50 to-gray-100" >
        <div class="container mx-auto px-1">
            <div class="text-center mb-20">
                <h2 class="text-5xl font-bold text-orange-500 mb-6">FASILITAS</h2>
            </div>
            
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden max-w-7xl mx-auto" id="fasilitas">
                <div class="lg:flex">
                    <!-- Left Content -->
                    <div class="lg:w-2/5 p-10 flex items-center relative" 
                        style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('https://images.unsplash.com/photo-1606761568499-6d2451b23c66?w=600&h=400&fit=crop')">
                        <div class="text-white relative z-10">
                            <h3 class="text-4xl font-bold mb-6 leading-tight">
                                Our Five Star Facilities
                            </h3>
                            <p class="text-gray-200 text-lg leading-relaxed mb-8">
                                Fasilitas terbaik dengan standar internasional untuk mendukung proses pembelajaran yang optimal.
                            </p>
                        </div>
                    </div>
                    
                    <!-- Right Content - Enhanced height -->
                    <div class="lg:w-3/5 p-6">
                        <div class="facility-container" style="height: 500px;"> <!-- Increased height -->
                            <div class="grid grid-cols-3 gap-4 h-full">
                                <!-- Column 1 - Slide Up -->
                                <div class="facility-slide-up">
                                    <div class="facility-column">
                                        
                                        @foreach ($fasilitas as $data)    
                                        <img src="{{ asset('storage/' . $data->image) }}" 
                                        alt="Office" class="rounded w-full h-40 object-cover">
                                        @endforeach
                                        
                                    </div>
                                </div>
                                
                                <!-- Column 2 - Slide Down -->
                                <div class="facility-slide-down">
                                    <div class="facility-column">
                                        <!-- Duplicate images to make the column longer -->
                                       @foreach ($fasilitas as $data)    
                                        <img src="{{ asset('storage/' . $data->image) }}" 
                                        alt="Office" class="rounded w-full h-40 object-cover">
                                        @endforeach
                                    </div>
                                </div>
                                
                                <!-- Column 3 - Slide Up -->
                                <div class="facility-slide-up">
                                    <div class="facility-column">
                                        <!-- Duplicate images to make the column longer -->
                                        @foreach ($fasilitas as $data)    
                                        <img src="{{ asset('storage/' . $data->image) }}" 
                                        alt="Office" class="rounded w-full h-40 object-cover">
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>














    <!-- Testimoni -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-center mb-16">TESTIMONI</h2>
            <div class="overflow-hidden max-w-6xl mx-auto">
                <div class="flex slide-animation space-x-6">
                    
                    @foreach ($testimoni as $test )                        
                    <div class="flex-shrink-0 w-80 bg-white rounded-lg shadow-lg p-6 border">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-gray-300 rounded-full mr-4">
                                <img src="{{ asset('uploads/testimoni/' . $test->src) }}" class="w-12 h-12 object-cover rounded-full" alt="">
                            </div>
                            <div>
                                <h4 class="font-semibold">{{ $test->alt }}</h4>
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm">{{ $test->review }}</p>
                    </div>
                    @endforeach

                   
        
                </div>
            </div>
        </div>
    </section>




     <!-- Our Social Media -->
    <section class="py-20 bg-gray-100">
        <div class="container mx-auto px-6">
            <div class="bg-white rounded-lg shadow-xl overflow-hidden max-w-6xl mx-auto">
                <div class="md:flex md:items-center">
                    <div class="md:w-1/3 p-8">
                        
                        
                        <div class="pb-5">
                           <img src="image/homepage/activity/gambar2.jpg" alt="">
                        </div>

                        <h2 class="text-3xl font-bold text-orange-500 mb-6">Our Sosmed!</h2>
                        
                        <div class="mt-8 space-y-3">
                           

                            @foreach ($sosmed as $sos )
                            <a href="{{ $sos->link }}" class="flex items-center p-3 bg-[{{ $sos->color }}] text-white rounded-lg"> 
                                <img src="{{ asset('storage/'. $sos->image) }}" alt="">
                              <span class="ml-2 font-bold">{{ $sos->name }}</span> 
                            </a>

                         @endforeach
                            
                           
                        </div>

                        <div class="pt-5">
                             <img src="image/homepage/activity/gambar2.jpg" alt="">
                        </div>

                         
                    </div>
                    <div class="md:w-2/3  p-8 bg-white">
                        <div class="h-auto bg-gray-100 rounded-lg flex items-center justify-center">
                            <div class="text-center text-gray-400">
                                <img src="image/homepage/brosur/brosur1.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection