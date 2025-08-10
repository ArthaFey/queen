<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=" Selamat Ezzy yang hebat, selamat datang di rumah kedua kita, sebuah rumah harapan perjalanan pendidikan rumah bagi generasi muda, bertransformasi menjadi pribadi - pribadi yang lebih baik, lebih termotivasi lebih percaya diri, lebih memiliki pengetahuan terhadap hari esok yang cemerlang, sebuah rumah dimana cita - cita harapan kita diharapkan bisa diwujudkannya dengan nyata dihantarkan kita, didorong dan dimotivasi untuk mewujudkannya dengan nyata diharapkan kita.">
    <title>Queen International Bali</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/homepage/styles.css">
    <link rel="icon" href="image/homepage/icon.png">

</head>
<body class="font-poppins overflow-x-hidden">
   
     <header class="shadow relative">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <img src="image/homepage/PULPEN.png" alt="Logo" class="max-h-14 w-auto object-contain" />
            </div>

            <!-- Desktop Nav -->
            <nav class="hidden md:flex items-center space-x-6 text-sm font-semibold text-gray-700">
                <a href="{{ route('frontend.home') }}" class="hover:text-orange-500 transition-colors">BERANDA</a>

                {{-- <!-- Tentang Kami Desktop -->
                <div class="relative group">
                    <button class="hover:text-orange-500 flex items-center gap-1 transition-colors">
                        TENTANG KAMI
                        <svg class="w-3 h-3 fill-current mt-[2px] transition-transform group-hover:rotate-180" viewBox="0 0 20 20"><path d="M5.5 7l4.5 4.5L14.5 7z"/></svg>
                    </button>
                    <div class="absolute left-0 top-8 opacity-0 invisible group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-300 bg-white rounded-lg shadow-lg w-44 py-2 z-50 border">
                        <a href="about us_profile.html" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-500 transition-colors">Profile</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-500 transition-colors">Preparation Class</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-500 transition-colors">Fasilitas</a>
                    </div>
                </div>

                <!-- Program Desktop -->
                <div class="relative group">
                    <button class="hover:text-orange-500 flex items-center gap-1 transition-colors">
                        PROGRAM
                        <svg class="w-3 h-3 fill-current mt-[2px] transition-transform group-hover:rotate-180" viewBox="0 0 20 20"><path d="M5.5 7l4.5 4.5L14.5 7z"/></svg>
                    </button>
                    <div class="absolute left-0 top-8 opacity-0 invisible group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-300 bg-white rounded-lg shadow-lg w-44 py-2 z-50 border">
                        <a href="detail_mahasiswa_program.html" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-500 transition-colors">Mahasiswa Baru</a>
                        <a href="detail_kapalpesiar_program.html" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-500 transition-colors">Kapal Pesiar</a>
                        <a href="detail_kuliahln_program.html" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-500 transition-colors">Kuliah Luar Negeri</a>
                    </div>
                </div>

                <a href="pendaftaran.html" class="ml-4 bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-full text-sm transition-colors">Daftar Sekarang</a> --}}
            </nav>

            <!-- Burger Menu (Mobile) -->
            <button id="burger-btn" class="md:hidden focus:outline-none">
                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden px-6 pb-4 space-y-2 text-sm font-semibold bg-white border-t">
            <a href="{{ route('frontend.home') }}" class="block text-gray-700 hover:text-orange-500 py-2 transition-colors">BERANDA</a>

            <!-- Tentang Kami Mobile -->
            {{-- <button onclick="toggleSubMenu('subTentangKami')" class="w-full text-left flex justify-between items-center text-gray-700 hover:text-orange-500 py-2 transition-colors">
                TENTANG KAMI
                <svg class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6" /></svg>
            </button>
            <div id="subTentangKami" class="hidden pl-4 space-y-1 text-sm">
                <a href="about us_profile.html" class="block text-gray-600 hover:text-orange-500 py-1 transition-colors">Profile</a>
                <a href="#" class="block text-gray-600 hover:text-orange-500 py-1 transition-colors">Preparation Class</a>
                <a href="#" class="block text-gray-600 hover:text-orange-500 py-1 transition-colors">Fasilitas</a>
            </div>

            <!-- Program Mobile -->
            <button onclick="toggleSubMenu('subProgram')" class="w-full text-left flex justify-between items-center text-gray-700 hover:text-orange-500 py-2 transition-colors">
                PROGRAM
                <svg class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6" /></svg>
            </button>
            <div id="subProgram" class="hidden pl-4 space-y-1 text-sm">
                <a href="detail_mahasiswa_program.html" class="block text-gray-600 hover:text-orange-500 py-1 transition-colors">Mahasiswa Baru</a>
                <a href="detail_kapalpesiar_program.html" class="block text-gray-600 hover:text-orange-500 py-1 transition-colors">Kapal Pesiar</a>
                <a href="detail_kuliahln_program.html" class="block text-gray-600 hover:text-orange-500 py-1 transition-colors">Kuliah Luar Negeri</a>
            </div>

            <a href="pendaftaran.html" class="block text-white bg-orange-500 hover:bg-orange-600 px-4 py-2 rounded-full text-center w-max mt-4 transition-colors">Daftar Sekarang</a> --}}
        </div>
    </header>



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
                    <h1 class="text-5xl lg:text-6xl font-bold text-white mb-4 leading-tight">
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




    <!-- Spacing Section -->
    <div class="py-2 bg-gradient-to-b from-gray-10 to-white"></div>


    <!-- Kegiatan Queen Section -->
    <section class="py-20 bg-white relative">
   

        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=1200&h=600&fit=crop" 
                 alt="Building Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        </div>

        
        <div class="container mx-auto px-6 relative z-10">
            <h2 class="text-4xl font-bold text-center mb-4 text-white">
                Kegiatan <span class="text-orange-500">Queen</span>
            </h2>
            <p class="text-center text-white mb-16 opacity-90">Lorem ipsum dolor sit amet consectetur adipiscing elit</p>
            
            <!-- Three Cards with Transparent Background -->
            <div class="grid md:grid-cols-3 gap-3 max-w-6xl mx-auto">
                
                <div class="bg-white bg-opacity-90 backdrop-blur-sm rounded-lg overflow-hidden border border-white border-opacity-20">
                    <div class="h-52 bg-gray-200 bg-opacity-50">
                         <img src="../image/homepage/activity/gambar.jpg" alt="Building Background" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-3 text-gray-800">Workshop Teknologi</h3>
                        <p class="text-gray-700 text-sm leading-relaxed">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>




 
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold text-orange-500">
                KAMPUS RAMAH TAMAH DAN CRUISE LINE DI BALI!
            </h2>
        </div>
    </section>




    <!-- Pesan dari Pemilik -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="max-w-6xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="md:flex">
                    <div class="md:w-1/3 p-0 flex items-center justify-center">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=300&h=300&fit=crop&crop=face" 
                             alt="Founder" class="w-full rounded object-cover">
                    </div>
                    <div class="md:w-2/3 p-8">
                        <h3 class="text-2xl font-bold mb-6">
                            Message From Founder <br>
                            <span class="text-orange-500">Queen International Bali</span>
                        </h3>
                        <p class="text-gray-700 leading-relaxed text-sm">
                            Selamat Ezzy yang hebat, selamat datang di rumah kedua kita, sebuah rumah harapan perjalanan pendidikan rumah bagi generasi muda, bertransformasi menjadi pribadi - pribadi yang lebih baik, lebih termotivasi lebih percaya diri, lebih memiliki pengetahuan terhadap hari esok yang cemerlang, sebuah rumah dimana cita - cita harapan kita diharapkan bisa diwujudkannya dengan nyata dihantarkan kita, didorong dan dimotivasi untuk mewujudkannya dengan nyata diharapkan kita.
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
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    </p>
                </div>
                <div class="md:w-2/3">
                    <div class="overflow-hidden relative">
                        <div class="flex partner-slide items-center" id="partnerSlider">
                            
                            <div class="flex-shrink-0 rounded flex items-center justify-center mx-4">
                                <img src="image/homepage/partner/pn1.jpg" class="h-20" alt="">
                            </div>
                          
                           <div class="flex-shrink-0 rounded flex items-center justify-center mx-4">
                                <img src="image/homepage/partner/pn2.png" class="h-20" alt="">
                            </div>
                            
                            <div class="flex-shrink-0 rounded flex items-center justify-center mx-4">
                                <img src="image/homepage/partner/pn3.jpg" class="h-20" alt="">
                            </div>

                            <div class="flex-shrink-0 rounded flex items-center justify-center mx-4">
                                <img src="image/homepage/partner/pn4.jpg" class="h-20" alt="">
                            </div>

                            <div class="flex-shrink-0 rounded flex items-center justify-center mx-4">
                                <img src="image/homepage/partner/pn5.png" class="h-20" alt="">
                            </div>

                            <div class="flex-shrink-0 rounded flex items-center justify-center mx-4">
                                <img src="image/homepage/partner/pn6.jpeg" class="h-20" alt="">
                            </div>
                            
                            <div class="flex-shrink-0 rounded flex items-center justify-center mx-4">
                                <img src="image/homepage/partner/pn7.jpg" class="h-20" alt="">
                            </div>

                            <div class="flex-shrink-0 rounded flex items-center justify-center mx-4">
                                <img src="image/homepage/partner/pn8.jpg" class="h-20" alt="">
                            </div>

                            <div class="flex-shrink-0 rounded flex items-center justify-center mx-4">
                                <img src="image/homepage/partner/pn9.jpg" class="h-20" alt="">
                            </div>

            
                           
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <!-- Sertifikat -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-center mb-16">CERTIFICATE</h2>
            <div class="flex items-center justify-center max-w-6xl mx-auto" id="certificateSection">
                <button id="prevCert" class="w-12 h-12 bg-gray-300 rounded-lg flex items-center justify-center hover:bg-gray-400 transition-colors mr-4 z-10">‹</button>
                <div class="flex-1 overflow-hidden">
                    <div class="flex items-center justify-center transition-transform duration-500 ease-in-out" id="certificateSlider">
                        <!-- Certificates will be dynamically inserted here -->
                    </div>
                </div>
                <button id="nextCert" class="w-12 h-12 bg-gray-300 rounded-lg flex items-center justify-center hover:bg-gray-400 transition-colors ml-4 z-10">›</button>
            </div>
        </div>
    </section>



    <!-- Program -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-center mb-16">PROGRAM STUDY</h2>
            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="image/homepage/program/gambar2.jpeg" 
                         alt="Kapal Pesiar" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Kapal Pesiar</h3>
                        <p class="text-gray-600 text-sm mb-4">Program ini dijalankan untuk yang ingin bekerja di kapal</p>
                        <button class="text-orange-500 font-semibold text-sm hover:underline">Detail</button>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="image/homepage/program/gambar1.jpeg" 
                         alt="Kuliah Keluar Negeri" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Kuliah Keluar Negeri</h3>
                        <p class="text-gray-600 text-sm mb-4">Program ini dijalankan untuk yang ingin bekerja di luar negeri</p>
                        <button class="text-orange-500 font-semibold text-sm hover:underline">Detail</button>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="image/homepage/banner/banner3.jpg" 
                         alt="Perhotelan" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Perhotelan</h3>
                        <p class="text-gray-600 text-sm mb-4">Program ini dijalankan untuk yang ingin bekerja di hotel</p>
                        <button class="text-orange-500 font-semibold text-sm hover:underline">Detail</button>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Fasilitas -->
    <section class="py-20 bg-gray-100">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-center mb-16">FASILITAS</h2>
            <div class="bg-white rounded-lg shadow-xl overflow-hidden max-w-6xl mx-auto">
                <div class="md:flex h-96">
                    <div class="md:w-1/2 p-8 flex items-center relative" 
                         style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('https://images.unsplash.com/photo-1606761568499-6d2451b23c66?w=600&h=400&fit=crop')">
                        <div class="text-white">
                            <h3 class="text-3xl font-bold mb-4">Our Five Star Facilities</h3>
                            <p class="text-gray-200">Fasilitas terbaik dengan standar internasional untuk mendukung proses pembelajaran yang optimal.</p>
                        </div>
                    </div>
                    <div class="md:w-1/2 p-4">
                        <div class="grid grid-cols-3 gap-2 h-full overflow-hidden">
                            <div class="facility-slide-up">
                                <div class="facility-column space-y-2">
                                    <img src="image/homepage/fasilitas/gambar1.jpg" 
                                         alt="Office" class="rounded w-full h-20 object-cover">
                                    <img src="image/homepage/fasilitas/gambar2.jpg" 
                                         alt="Office" class="rounded w-full h-20 object-cover">
                                    <img src="image/homepage/fasilitas/gambar3.jpg" 
                                         alt="Office" class="rounded w-full h-20 object-cover">
                                    <img src="image/homepage/fasilitas/gambar4.jpg" 
                                         alt="Office" class="rounded w-full h-20 object-cover">
                                </div>
                            </div>
                            <div class="facility-slide-down">
                                <div class="facility-column space-y-2">
                                   <img src="image/homepage/fasilitas/gambar5.jpg" 
                                         alt="Office" class="rounded w-full h-20 object-cover">
                                    <img src="image/homepage/fasilitas/gambar6.jpg" 
                                         alt="Office" class="rounded w-full h-20 object-cover">
                                    <img src="image/homepage/fasilitas/gambar7.jpg" 
                                         alt="Office" class="rounded w-full h-20 object-cover">
                                    <img src="image/homepage/fasilitas/gambar8.jpg" 
                                         alt="Office" class="rounded w-full h-20 object-cover">
                                </div>
                            </div>
                            <div class="facility-slide-up">
                                <div class="facility-column space-y-2">
                                    <img src="image/homepage/fasilitas/gambar9.jpg" 
                                         alt="Office" class="rounded w-full h-20 object-cover">
                                    <img src="image/homepage/fasilitas/gambar10.jpg" 
                                         alt="Office" class="rounded w-full h-20 object-cover">
                                    <img src="image/homepage/fasilitas/gambar11.jpg" 
                                         alt="Office" class="rounded w-full h-20 object-cover">
                                    <img src="image/homepage/fasilitas/gambar12.jpg" 
                                         alt="Office" class="rounded w-full h-20 object-cover">
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
                    
                    
                    <div class="flex-shrink-0 w-80 bg-white rounded-lg shadow-lg p-6 border">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-gray-300 rounded-full mr-4"></div>
                            <div>
                                <h4 class="font-semibold">Nama</h4>
                                <p class="text-sm text-gray-500">Position</p>
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                   
                   
                    <div class="flex-shrink-0 w-80 bg-white rounded-lg shadow-lg p-6 border">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-gray-300 rounded-full mr-4"></div>
                            <div>
                                <h4 class="font-semibold">Nama</h4>
                                <p class="text-sm text-gray-500">Position</p>
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                    <div class="flex-shrink-0 w-80 bg-white rounded-lg shadow-lg p-6 border">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-gray-300 rounded-full mr-4"></div>
                            <div>
                                <h4 class="font-semibold">Nama</h4>
                                <p class="text-sm text-gray-500">Position</p>
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                    <div class="flex-shrink-0 w-80 bg-white rounded-lg shadow-lg p-6 border">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-gray-300 rounded-full mr-4"></div>
                            <div>
                                <h4 class="font-semibold">Nama</h4>
                                <p class="text-sm text-gray-500">Position</p>
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                    <!-- Duplicate for seamless loop -->
                    <div class="flex-shrink-0 w-80 bg-white rounded-lg shadow-lg p-6 border">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-gray-300 rounded-full mr-4"></div>
                            <div>
                                <h4 class="font-semibold">Nama</h4>
                                <p class="text-sm text-gray-500">Position</p>
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
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
                        <h2 class="text-3xl font-bold text-orange-500 mb-6">Our Sosmed!</h2>
                        
                        <div class="mt-8 space-y-3">
                            <a href="#" class="flex items-center p-3 bg-green-500 text-white rounded-lg hover:bg-green-600 transition duration-300">
                                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                                </svg>
                                WhatsApp
                            </a>
                            <a href="#" class="flex items-center p-3 bg-pink-500 text-white rounded-lg hover:bg-pink-600 transition duration-300">
                                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                </svg>
                                Instagram
                            </a>
                            <a href="#" class="flex items-center p-3 bg-black text-white rounded-lg hover:bg-gray-800 transition duration-300">
                                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/>
                                </svg>
                                TikTok
                            </a>
                            <a href="#" class="flex items-center p-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-300">
                                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                </svg>
                                Twitter
                            </a>
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





    <!-- Footer -->
    <footer class="bg-black text-white py-16">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <div>
                    <div class="flex items-center mb-6">
                        <div class=" rounded flex items-center justify-center mr-3 -mt-5">
                            <img src="image/homepage/LOGO FULL.png" alt="Logo Queen" class="h-16 sm:h-20 w-auto">
                        </div>
                        
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Jl. Bypass Ngurah Rai, Danpesar Timur<br>
                        Denpasar, Bali<br><br>
                        Email: queen@international.com
                    </p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-6 text-orange-500">Menu</h3>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Beranda</a></li>
                        {{-- <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Tentang Kami</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Program</a></li> --}}
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-6 text-orange-500">Maps</h3>
                    <div class="bg-gray-800 rounded-lg h-32 flex items-center justify-center">
                        <span class="text-gray-500 text-sm">📍 Google Maps Location</span>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-12 pt-8 text-center">
                <p class="text-gray-400 text-sm">© 2025 queenbali.com All Rights Reserved Design by  <a href="https://www.indoapps.id/" style="text-decoration:underline; color:rgb(0, 119, 255);">Indoapps Solusindo</a></p>
            </div>
        </div>
    </footer>


   

    

    <!-- JavaScript for Enhanced Navbar -->
     <script>
        const burgerBtn = document.getElementById('burger-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        burgerBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        function toggleSubMenu(id) {
            const el = document.getElementById(id);
            el.classList.toggle('hidden');
        }

        // Add scroll effect to navbar
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Banner Data
       const bannerImages = [
            {
                src: 'image/homepage/banner/banner1.jpg',
                alt: 'Classroom Background'
            }, 
            {
                src: 'image/homepage/banner/banner2.png',
                alt: 'Classroom Background'
            }, 
            {
                src: 'image/homepage/banner/banner3.jpg',
                alt: 'Classroom Background'
            }, 
            {
                src: 'image/homepage/banner/banner4.jpg',
                alt: 'Classroom Background'
            }, 
            {
                src: 'image/homepage/banner/banner5.jpg',
                alt: 'Classroom Background'
            }, 
        ];

        // Certificate Data
        const certificateData = [
            {
                name: "Sertifikat1",
                image: "sertifikat.jpg"
            },
        ];

        // Global variables
        let currentBannerIndex = 0;
        let currentCertificateIndex = 2;
        let bannerAutoSlide;
        let certificateAutoSlide;

        // Initialize everything when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            initializeBanner();
            initializeCertificateSlider();
            initializeScrollEffects();
        });

        // Banner Functions
        function initializeBanner() {
            createBannerSlides();
            createBannerIndicators();
            showBannerSlide(0);
            startBannerAutoSlide();
            
            // Event listeners for banner controls
            document.getElementById('prevBanner').addEventListener('click', () => {
                stopBannerAutoSlide();
                showBannerSlide(currentBannerIndex - 1);
                startBannerAutoSlide();
            });
            
            document.getElementById('nextBanner').addEventListener('click', () => {
                stopBannerAutoSlide();
                showBannerSlide(currentBannerIndex + 1);
                startBannerAutoSlide();
            });

            // Pause auto-slide on hover
            const heroSection = document.getElementById('heroSection');
            heroSection.addEventListener('mouseenter', stopBannerAutoSlide);
            heroSection.addEventListener('mouseleave', startBannerAutoSlide);
        }

        function createBannerSlides() {
            const container = document.getElementById('bannerContainer');
            container.innerHTML = '';
            
            bannerImages.forEach((image, index) => {
                const slide = document.createElement('div');
                slide.className = 'banner-slide';
                slide.innerHTML = `
                    <img src="${image.src}" alt="${image.alt}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                `;
                container.appendChild(slide);
            });
        }

        function createBannerIndicators() {
            const container = document.getElementById('bannerIndicators');
            container.innerHTML = '';
            
            bannerImages.forEach((_, index) => {
                const indicator = document.createElement('div');
                indicator.className = 'banner-indicator';
                indicator.addEventListener('click', () => {
                    stopBannerAutoSlide();
                    showBannerSlide(index);
                    startBannerAutoSlide();
                });
                container.appendChild(indicator);
            });
        }

        function showBannerSlide(index) {
            const slides = document.querySelectorAll('.banner-slide');
            const indicators = document.querySelectorAll('.banner-indicator');
            
            // Handle index wrapping
            if (index >= bannerImages.length) index = 0;
            if (index < 0) index = bannerImages.length - 1;
            
            currentBannerIndex = index;
            
            // Update slides
            slides.forEach((slide, i) => {
                slide.classList.toggle('active', i === index);
            });
            
            // Update indicators
            indicators.forEach((indicator, i) => {
                indicator.classList.toggle('active', i === index);
            });
        }

        function startBannerAutoSlide() {
            bannerAutoSlide = setInterval(() => {
                showBannerSlide(currentBannerIndex + 1);
            }, 5000);
        }

        function stopBannerAutoSlide() {
            if (bannerAutoSlide) {
                clearInterval(bannerAutoSlide);
            }
        }

        // Certificate Functions
        function initializeCertificateSlider() {
            createCertificateSlides();
            updateCertificateSlider();
            startCertificateAutoSlide();
            
            // Event listeners for certificate controls
            document.getElementById('prevCert').addEventListener('click', () => {
                stopCertificateAutoSlide();
                currentCertificateIndex = (currentCertificateIndex - 1 + certificateData.length) % certificateData.length;
                updateCertificateSlider();
                startCertificateAutoSlide();
            });
            
            document.getElementById('nextCert').addEventListener('click', () => {
                stopCertificateAutoSlide();
                currentCertificateIndex = (currentCertificateIndex + 1) % certificateData.length;
                updateCertificateSlider();
                startCertificateAutoSlide();
            });

            // Pause auto-slide on hover
            const certSection = document.getElementById('certificateSection');
            certSection.addEventListener('mouseenter', stopCertificateAutoSlide);
            certSection.addEventListener('mouseleave', startCertificateAutoSlide);
        }

        function createCertificateSlides() {
            const container = document.getElementById('certificateSlider');
            container.innerHTML = '';
            
            // Create 5 visible certificates (2 left + 1 center + 2 right)
            for (let i = 0; i < 5; i++) {
                const certItem = document.createElement('div');
                certItem.className = 'certificate-item flex-shrink-0 transition-all duration-500 ease-in-out';
                container.appendChild(certItem);
            }
        }

        function updateCertificateSlider() {
            const certificateItems = document.querySelectorAll('.certificate-item');
            
            certificateItems.forEach((item, index) => {
                let dataIndex;
                
                // Calculate which certificate data to show for each position
                if (index === 0) { // Far left
                    dataIndex = (currentCertificateIndex - 2 + certificateData.length) % certificateData.length;
                } else if (index === 1) { // Left
                    dataIndex = (currentCertificateIndex - 1 + certificateData.length) % certificateData.length;
                } else if (index === 2) { // Center
                    dataIndex = currentCertificateIndex;
                } else if (index === 3) { // Right
                    dataIndex = (currentCertificateIndex + 1) % certificateData.length;
                } else { // Far right
                    dataIndex = (currentCertificateIndex + 2) % certificateData.length;
                }
                
                const currentData = certificateData[dataIndex];
                
                // Style based on position
                if (index === 2) { // Center item
                    item.className = 'certificate-item certificate-center flex-shrink-0 transition-all duration-500 ease-in-out';
                
                        item.innerHTML = `
                            <div class="w-64 h-48 md:w-72 md:h-52 bg-gradient-to-br from-red-500 to-yellow-500 rounded-lg shadow-xl flex items-center justify-center mx-2">
                                <div class="text-center text-white">
                                     <img src="image/homepage/sertifikat/${currentData.image}" alt="">
                                </div>
                            </div>
                        `;
                  
                        item.innerHTML = `
                            <div class="w-64 h-48 md:w-72 md:h-52  rounded-lg shadow-xl flex items-center justify-center mx-2">
                                <div class="text-center text-white">
                                    <img src="image/homepage/sertifikat/${currentData.image}" alt="">
                                </div>
                            </div>
                        `;
                    
                } else { // Side items
                    item.className = 'certificate-item certificate-side flex-shrink-0 transition-all duration-500 ease-in-out';
                
                    item.innerHTML = `
                        <div class="w-48 h-36 md:w-56 md:h-40  rounded-lg shadow-lg flex items-center justify-center mx-2">
                            <div class="text-center text-gray-600">
                                  <img src="image/homepage/sertifikat/${currentData.image}" alt="">
                            </div>
                        </div>
                    `;
                }
            });
        }

        function startCertificateAutoSlide() {
            certificateAutoSlide = setInterval(() => {
                currentCertificateIndex = (currentCertificateIndex + 1) % certificateData.length;
                updateCertificateSlider();
            }, 4000);
        }

        function stopCertificateAutoSlide() {
            if (certificateAutoSlide) {
                clearInterval(certificateAutoSlide);
            }
        }

        // Scroll Effects
        function initializeScrollEffects() {
            let ticking = false;

            function updateScrollEffects() {
                const header = document.querySelector('header');
                const scrollY = window.scrollY;

                if (scrollY > 100) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }

                ticking = false;
            }

            function requestScrollUpdate() {
                if (!ticking) {
                    requestAnimationFrame(updateScrollEffects);
                    ticking = true;
                }
            }

            window.addEventListener('scroll', requestScrollUpdate);
        }

        // Smooth scrolling for navigation
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const headerHeight = document.querySelector('header').offsetHeight;
                    const targetPosition = target.offsetTop - headerHeight;
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Performance optimization
        function debounce(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        }

        // Resize handler
        const handleResize = debounce(() => {
            // Adjust animations based on screen size
            const isMobile = window.innerWidth < 768;
            const animations = document.querySelectorAll('.partner-slide, .slide-animation, .facility-column');
            
            animations.forEach(element => {
                if (isMobile) {
                    if (element.classList.contains('partner-slide')) {
                        element.style.animationDuration = '20s';
                    } else if (element.classList.contains('slide-animation')) {
                        element.style.animationDuration = '15s';
                    } else if (element.classList.contains('facility-column')) {
                        element.style.animationDuration = '15s';
                    }
                } else {
                    if (element.classList.contains('partner-slide')) {
                        element.style.animationDuration = '30s';
                    } else if (element.classList.contains('slide-animation')) {
                        element.style.animationDuration = '25s';
                    } else if (element.classList.contains('facility-column')) {
                        element.style.animationDuration = '20s';
                    }
                }
            });

            // Update certificate slider for mobile
            if (isMobile) {
                updateCertificateSlider();
            }
        }, 250);

        window.addEventListener('resize', handleResize);

        // Initialize loading animations
        function initializeAnimations() {
            const sections = document.querySelectorAll('section');
            sections.forEach((section, index) => {
                section.classList.add('loading');
                section.style.animationDelay = `${index * 0.1}s`;
            });
        }

        // Call initialization functions
        initializeAnimations();

        // Add intersection observer for better performance
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('loading');
                }
            });
        }, observerOptions);

        // Observe all sections
        document.querySelectorAll('section').forEach(section => {
            observer.observe(section);
        });

        // Enhanced mobile menu (if needed in future)
        function initializeMobileMenu() {
            const mobileMenuButton = document.getElementById('mobileMenuButton');
            const mobileMenu = document.getElementById('mobileMenu');
            
            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                });
            }
        }

        // Error handling for images
        function handleImageErrors() {
            const images = document.querySelectorAll('img');
            images.forEach(img => {
                img.addEventListener('error', function() {
                    console.warn('Failed to load image:', this.src);
                    // You could replace with a placeholder image here
                    this.style.backgroundColor = '#f0f0f0';
                    this.alt = 'Image not available';
                });
            });
        }

        // Initialize image error handling
        handleImageErrors();

        // Preload critical images
        function preloadCriticalImages() {
            const criticalImages = [
                'images/IMG_1037.png',
                'images/PULPEN.png',
                'images/LOGO FULL.png'
            ];
            
            criticalImages.forEach(src => {
                const img = new Image();
                img.src = src;
            });
        }

        // Call preload function
        preloadCriticalImages();
    </script>
</body>
</html>