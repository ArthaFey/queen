<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Welcome to Queen Internasional the truly brand new campus, dengan dynamic dan innovative concept the center of excellent. <br><br>
                            Sebuah kampus sebagai rumah bertransformasi mengajak kalian bermimpi hebat, menggapai impian hebatmu, melakukan tindakan hebat demi cita,cinta,masa depan, yang gemilang.
                            Kampus yang menemanimu menemukan hasrat,membingkai hobby serta passion mu, menggelorakan semangat perjuangan sebagai landasan kuat berpijak untuk bersama - sama bergandengan tangan mengarungi samudra kasih kehidupan sebagai berkah dan karunia dari Tuhan yang maha kuasa patut untuk di syukuri.<br><br>
                            Congratulation for joining hospitality kampus terbaik jaman now.Congratulation to be a part of the Queeners Family.">
    <title>Queen International Bali</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Tambahkan Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="../css/homepage/styles.css">
    <link rel="icon" href="{{ asset('icon.png') }}">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">

    <!-- AOS  -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <style>
          .swiper-pagination-bullet{
            background-color: #f2924d !important;
        }

        .swiper-pagination-bullet-active{
            background-color: #F97316 !important;
        }

    </style>
 

</head>
<body class=" overflow-x-hidden ">
   
    <header class="shadow relative">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <img src="{{ asset('queenlogo.png') }}" alt="Logo" class="h-20 w-auto md:h-20" style="height: 100px;" />
            </div>

            <!-- Desktop Nav -->
            <nav class="hidden md:flex items-center space-x-6 text-sm font-semibold text-gray-700">
                <a href="{{ route('frontend.home') }}" class="hover:text-orange-500 transition-colors">BERANDA</a>

                <!-- Tentang Kami Desktop -->
                <div class="relative group">
                    <button class="hover:text-orange-500 flex items-center gap-1 transition-colors">
                        TENTANG KAMI
                        <svg class="w-3 h-3 fill-current mt-[2px] transition-transform group-hover:rotate-180" viewBox="0 0 20 20"><path d="M5.5 7l4.5 4.5L14.5 7z"/></svg>
                    </button>
                    <div class="absolute left-0 top-8 opacity-0 invisible group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-300 bg-white rounded-lg shadow-lg w-44 py-2 z-50 border">
                        <a href="{{ route('profile.queen') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-500 transition-colors">Profile</a>
                        <a href="{{ route('allFasilitas') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-500 transition-colors">Fasilitas</a>
                    </div>
                </div>

                <!-- Program Desktop -->
                <div class="relative group">
                    <button class="hover:text-orange-500 flex items-center gap-1 transition-colors">
                        PROGRAM
                        <svg class="w-3 h-3 fill-current mt-[2px] transition-transform group-hover:rotate-180" viewBox="0 0 20 20"><path d="M5.5 7l4.5 4.5L14.5 7z"/></svg>
                    </button>
                    <div class="absolute left-0 top-8 opacity-0 invisible group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-300 bg-white rounded-lg shadow-lg w-44 py-2 z-50 border">
                       @foreach ($program as $data )                           
                        <a href="{{ route('detail.program',$data->id) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-500 transition-colors">{{ $data['alt'] }}</a>
                       @endforeach

                    </div>
                </div>

                <a href="{{ route('pendaftaran.index') }}" class="ml-4 bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-full text-sm transition-colors">Daftar Sekarang</a>
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
            <button onclick="toggleSubMenu('subTentangKami')" class="w-full text-left flex justify-between items-center text-gray-700 hover:text-orange-500 py-2 transition-colors">
                TENTANG KAMI
                <svg class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6" /></svg>
            </button>
            <div id="subTentangKami" class="hidden pl-4 space-y-1 text-sm">
                <a href="{{ route('profile.queen') }}" class="block text-gray-600 hover:text-orange-500 py-1 transition-colors">Profile</a>
                <a href="{{ route('allFasilitas') }}" class="block text-gray-600 hover:text-orange-500 py-1 transition-colors">Fasilitas</a>
            </div>

            <!-- Program Mobile -->
            <button onclick="toggleSubMenu('subProgram')" class="w-full text-left flex justify-between items-center text-gray-700 hover:text-orange-500 py-2 transition-colors">
                PROGRAM
                <svg class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6" /></svg>
            </button>
            <div id="subProgram" class="hidden pl-4 space-y-1 text-sm">
                @foreach ($program as $dataMobile )                           
                        <a href="{{ route('detail.program',$dataMobile->id) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-500 transition-colors">{{ $data['alt'] }}</a>
                @endforeach
            </div>

            <a href="{{ route('pendaftaran.index') }}" class="block text-white bg-orange-500 hover:bg-orange-600 px-4 py-2 rounded-full text-center w-max mt-4 transition-colors">Daftar Sekarang</a>
        </div>
    </header>



  




    @yield('content')







   










<footer class="bg-black text-white py-16">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-8 max-w-6xl mx-auto">
                <!-- Logo & Alamat -->
                <div class="md:col-span-3 flex flex-col items-center md:items-start">
                    <div class="flex items-center mb-6">
                        <div class="rounded flex items-center justify-center mr-3 -mt-5">
                            <img src="{{ asset('icon.png') }}" alt="Logo Queen" class="h-16 sm:h-20 w-auto">
                        </div>
                    </div>
                    <!-- Alamat di bawah logo, deret ke samping di desktop -->
                    <div class="flex flex-col md:flex-row md:space-x-8 space-y-4 md:space-y-0 w-full justify-center md:justify-start">
                        <!-- Alamat 1 -->
                        <a href="https://maps.google.com/?q=Jl. Kebo Iwa, No. 12B, Gianyar, Bali" target="_blank" class="block hover:text-orange-400 transition text-center md:text-left">
                            <h4 class="font-bold mb-2 text-sm">ALAMAT 1 :</h4>
                            <span class="font-semibold">Queen Bali</span><br>
                            <span>Jl.XXX Telp. 00000</span> <br>
                            Telp. (0361) 945 887</span> </br>
                            <span>Email: queenbali@gmail.com</span>
                        </a>
                        <!-- Alamat 2 -->
                         <a href="https://maps.google.com/?q=Jl. Kebo Iwa, No. 12B, Gianyar, Bali" target="_blank" class="block hover:text-orange-400 transition text-center md:text-left">
                            <h4 class="font-bold mb-2 text-sm">ALAMAT 1 :</h4>
                            <span class="font-semibold">Queen Bali</span><br>
                            <span>Jl.XXX Telp. 00000</span> <br>
                            Telp. (0361) 945 887</span> </br>
                            <span>Email: queenbali@gmail.com</span>
                        </a>
                        <!-- Alamat 3 -->
                        <a href="https://maps.google.com/?q=Jl. Kebo Iwa, No. 12B, Gianyar, Bali" target="_blank" class="block hover:text-orange-400 transition text-center md:text-left">
                            <h4 class="font-bold mb-2 text-sm">ALAMAT 1 :</h4>
                            <span class="font-semibold">Queen Bali</span><br>
                            <span>Jl.XXX Telp. 00000</span> <br>
                            Telp. (0361) 945 887</span> </br>
                            <span>Email: queenbali@gmail.com</span>
                        </a>
                    </div>
                </div>
                <!-- Maps di kanan -->
                <div class="flex flex-col items-center md:items-end w-full">
                    <div class="relative w-full">
                        <h3 class="text-lg font-semibold text-orange-500 text-center absolute top-0 left-1/2 transform -translate-x-1/2 z-20 w-full pointer-events-none">
                            Maps
                        </h3>
                        <a href="https://maps.google.com/?q=Jl. Kebo Iwa, No. 12B, Gianyar, Bali" target="_blank"
                            class="block bg-gray-800 rounded-lg h-56 w-full md:w-64 flex items-center justify-center hover:bg-gray-700 transition overflow-hidden mt-8 relative">
                            <img src="image/homepage/maps-preview.jpg" alt="Lokasi Kampus" class="object-cover w-full h-full" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-12 pt-8 text-center">
                <p class="text-gray-400 text-sm">© 2025 queenbali.com All Rights Reserved Design by  <a href="https://www.indoapps.id/" style="text-decoration:underline; color:rgb(0, 119, 255);">Indoapps Solusindo</a></p>
            </div>
        </div>
</footer>


  


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


            
         

            @php
                $banner = collect($banner)->map(function($item){
                    $item['src'] = asset('uploads/banner/' . $item['src']);
                    return $item;
                });
            @endphp


                // Banner Data
            const bannerImages = @json($banner);


    

        // Global variables
        let currentBannerIndex = 0;
        let bannerAutoSlide;

        // Initialize everything when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            initializeBanner();
            initializeCertificateSlider();
            initializeScrollEffects();
            const facilityImages = document.querySelectorAll('.facility-column img');
            
            facilityImages.forEach(img => {
                img.addEventListener('mouseenter', function() {
                    // Pause all animations when hovering over an image
                    const columns = document.querySelectorAll('.facility-column');
                    columns.forEach(column => {
                        column.style.animationPlayState = 'paused';
                    });
                    
                    // Add special hover effect
                    this.style.transform = 'scale(1.1) rotate(2deg)';
                    this.style.zIndex = '20';
                });
                
                img.addEventListener('mouseleave', function() {
                    // Resume animations
                    const columns = document.querySelectorAll('.facility-column');
                    columns.forEach(column => {
                        column.style.animationPlayState = 'running';
                    });
                    
                    // Reset hover effect
                    this.style.transform = '';
                    this.style.zIndex = '';
                });
                
                // Add click effect
                img.addEventListener('click', function() {
                    // Create a temporary zoom effect
                    this.style.transform = 'scale(1.15)';
                    setTimeout(() => {
                        this.style.transform = '';
                    }, 200);
                });
            });
            
            // Intersection Observer for animations
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, {
                threshold: 0.1
            });
            
            // Observe facility section
            const facilitySection = document.querySelector('section');
            if (facilitySection) {
                facilitySection.style.opacity = '0';
                facilitySection.style.transform = 'translateY(50px)';
                facilitySection.style.transition = 'all 0.8s ease-out';
                observer.observe(facilitySection);
            }
            
            // Performance optimization
            let ticking = false;
            
            function updateAnimations() {
                // Check if user prefers reduced motion
                if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                    const animations = document.querySelectorAll('.facility-column');
                    animations.forEach(animation => {
                        animation.style.animation = 'none';
                    });
                }
                ticking = false;
            }
            
            function requestTick() {
                if (!ticking) {
                    requestAnimationFrame(updateAnimations);
                    ticking = true;
                }
            }
            
            // Add error handling for images
            facilityImages.forEach(img => {
                img.addEventListener('error', function() {
                    this.style.backgroundColor = '#f3f4f6';
                    this.style.display = 'flex';
                    this.style.alignItems = 'center';
                    this.style.justifyContent = 'center';
                    this.innerHTML = '<span style="color: #9ca3af; font-size: 12px;">Image not available</span>';
                });
            });
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
                'images/PULPEN.png',                /* Add this to your CSS file or inside a <style> tag */
                
                'images/LOGOFULL.png'
            ];
            
            criticalImages.forEach(src => {
                const img = new Image();
                img.src = src;
            });
        }
        

        // Call preload function
        preloadCriticalImages();
        (function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'96ecd4039402f8fc',t:'MTc1NTEzNjUwNy4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();
    </script>


<!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <!-- Kegiatan Swiper JS -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 20,
            centeredSlides: false,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                dynamicBullets: true,
            },
        });
    </script>

    <!-- Kegiatan Swiper JS -->
        <script>
           var swiper = new Swiper(".sertifikatSwiper", {
            loop: true,
            spaceBetween: 16,
            autoplay: {
                delay: 1000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            }
        });
        </script>

 


    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>