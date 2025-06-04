<section class="relative overflow-hidden">
    <!-- Swiper -->
    <div class="swiper h-[450px]">
        <div class="swiper-wrapper">

            {{-- Slide 1 --}}
            <div class="swiper-slide bg-green-600 text-white relative overflow-hidden">

                <!-- Dekoratif: Gelombang Atas -->
                <svg class="absolute top-0 left-0 w-full h-20 text-white opacity-10 z-0" viewBox="0 0 1440 320">
                    <path fill="currentColor" d="M0,64L80,85.3C160,107,320,149,480,170.7C640,192,800,192,960,181.3C1120,171,1280,149,1360,138.7L1440,128V0H0Z"/>
                </svg>

                <!-- Dekoratif: Coretan kiri bawah -->
                <svg class="absolute bottom-0 left-0 w-40 h-40 text-white opacity-10 z-0 rotate-45" viewBox="0 0 100 100">
                    <path d="M10,90 Q50,10 90,90" stroke="currentColor" stroke-width="10" fill="none" />
                </svg>

                <svg class="absolute top-20 left-10 w-28 h-28 text-white opacity-10 z-0 rotate-12" viewBox="0 0 100 100" fill="currentColor">
                    <polygon points="50,0 100,100 0,100"/>
                </svg>

                <svg class="absolute bottom-0 right-0 w-48 h-48 text-white opacity-5 z-0" viewBox="0 0 100 100" fill="none">
                    <path d="M50,50 m-25,0 a25,25 0 1,0 50,0 a25,25 0 1,0 -50,0" stroke="currentColor" stroke-width="2"/>
                </svg>


                <!-- Konten Utama -->
                <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center px-6 py-16 relative z-10">
                    <div class="md:w-1/2 space-y-4 z-10 pt-24">
                        <h1 class="text-4xl md:text-5xl font-bold leading-tight">Join Our Movement</h1>
                        <h3>Mari jadi bagian dari perubahan positif bagi lingkungan dan sesama. Bersama #ubahjadikebaikan, kamu bisa ambil peran nyata lewat aksi kecil setiap hari. Unduh aplikasinya dan mulai kontribusimu sekarang juga!</h3>
                        <p class="text-xl">#ubahjadikebaikan</p>
                        <div class="flex gap-4 mt-4">
                            <a href="https://play.google.com/store">
                                <img src="{{ asset('images/playstore-badge.png') }}" alt="Google Play" class="h-12">
                            </a>
                            <a href="https://www.apple.com/app-store/">
                                <img src="{{ asset('images/appstore-badge.png') }}" alt="App Store" class="h-12">
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Gambar kanan elips -->
                <div class="hidden md:block absolute right-0 top-0 -mt-8 z-0">
                    <svg width="600" height="500" viewBox="0 0 600 700" preserveAspectRatio="xMidYMid slice" class="w-[600px] h-[500px]">
                        <defs>
                            <clipPath id="ellipseClip1">
                                <ellipse cx="400" cy="250" rx="400" ry="250"/>
                            </clipPath>
                        </defs>
                        <image href="{{ asset('images/hero-banner.png') }}" width="600" height="500" clip-path="url(#ellipseClip1)" preserveAspectRatio="xMidYMid slice" />
                        <ellipse cx="400" cy="250" rx="400" ry="250" fill="none" stroke="white" stroke-width="1" style="pointer-events: none;" />
                    </svg>
                </div>
            </div>

            {{-- Slide 2 --}}
            <div class="swiper-slide bg-blue-400 text-white relative overflow-hidden">

                <!-- Dekoratif -->
                <svg class="absolute top-0 left-0 w-full h-20 text-white opacity-10 z-0" viewBox="0 0 1440 320">
                    <path fill="currentColor" d="M0,64L60,80C120,96,240,128,360,138.7C480,149,600,139,720,122.7C840,107,960,85,1080,90.7C1200,96,1320,128,1380,144L1440,160V0H0Z"/>
                </svg>
                <svg class="absolute bottom-0 left-0 w-32 h-32 text-white opacity-10 z-0 rotate-12" viewBox="0 0 100 100">
                    <path d="M10,90 Q50,10 90,90" stroke="currentColor" stroke-width="8" fill="none" />
                </svg>
                <svg class="absolute top-20 left-10 w-28 h-28 text-white opacity-10 z-0 rotate-12" viewBox="0 0 100 100" fill="currentColor">
                    <polygon points="50,0 100,100 0,100"/>
                </svg>
                <svg class="absolute bottom-0 right-0 w-48 h-48 text-white opacity-5 z-0" viewBox="0 0 100 100" fill="none">
                    <path d="M50,50 m-25,0 a25,25 0 1,0 50,0 a25,25 0 1,0 -50,0" stroke="currentColor" stroke-width="2"/>
                </svg>

                <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center px-6 py-16 relative z-10">
                    <div class="md:w-1/2 space-y-4 z-10 pt-24">
                        <h1 class="text-4xl md:text-5xl font-bold leading-tight">Dukung Daur Ulang</h1>
                        <h2>"Ubah Sampah Jadi Harapan Baru"</h2>
                        <h3>Daur ulang adalah langkah sederhana namun berdampak besar. Dukung gerakan #AksiNyataLingkungan dengan memilah sampah dan mengedukasi sekitar. Jadikan lingkungan lebih bersih dan sehat untuk generasi mendatang.</h3>
                        <p class="text-xl">#AksiNyataLingkungan</p>
                    </div>
                </div>

                <div class="hidden md:block absolute right-0 top-0 -mt-8 z-0">
                    <svg width="600" height="500" viewBox="0 0 600 700" preserveAspectRatio="xMidYMid slice" class="w-[600px] h-[500px]">
                        <defs>
                            <clipPath id="ellipseClip2">
                                <ellipse cx="400" cy="250" rx="400" ry="250"/>
                            </clipPath>
                        </defs>
                        <image href="{{ asset('images/hero-slide2.png') }}" width="600" height="500" clip-path="url(#ellipseClip2)" preserveAspectRatio="xMidYMid slice" />
                        <ellipse cx="400" cy="250" rx="400" ry="250" fill="none" stroke="white" stroke-width="1" style="pointer-events: none;" />
                    </svg>
                </div>
            </div>

            {{-- Slide 3 --}}
            <div class="swiper-slide bg-yellow-300 text-black relative overflow-hidden">

                <svg class="absolute top-0 left-0 w-full h-20 text-black opacity-10 z-0" viewBox="0 0 1440 320">
                    <path fill="currentColor" d="M0,96L60,117.3C120,139,240,181,360,181.3C480,181,600,139,720,117.3C840,96,960,96,1080,122.7C1200,149,1320,203,1380,229.3L1440,256V0H0Z"/>
                </svg>
                <svg class="absolute bottom-0 left-0 w-32 h-32 text-black opacity-10 z-0 -rotate-12" viewBox="0 0 100 100">
                    <path d="M10,90 Q50,10 90,90" stroke="currentColor" stroke-width="8" fill="none" />
                </svg>
                <svg class="absolute top-20 left-10 w-28 h-28 text-white opacity-10 z-0 rotate-12" viewBox="0 0 100 100" fill="currentColor">
                    <polygon points="50,0 100,100 0,100"/>
                </svg>
                <svg class="absolute bottom-0 right-0 w-48 h-48 text-white opacity-5 z-0" viewBox="0 0 100 100" fill="none">
                    <path d="M50,50 m-25,0 a25,25 0 1,0 50,0 a25,25 0 1,0 -50,0" stroke="currentColor" stroke-width="2"/>
                </svg>

                <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center px-6 py-16 relative z-10">
                    <div class="md:w-1/2 space-y-4 z-10 pt-24">
                        <h1 class="text-4xl md:text-5xl font-bold leading-tight">Bangun Masa Depan</h1>
                        <h2>"Smart City Hijau Dimulai dari Kita"</h2>
                        <h3>Kita semua punya andil dalam membentuk kota yang lebih cerdas dan ramah lingkungan. Melalui gerakan #SmartCityHijau, mari wujudkan masa depan yang berkelanjutan, dimulai dari gaya hidup eco-friendly dan teknologi hijau.</h3>
                        <p class="text-xl">#SmartCityHijau</p>
                    </div>
                </div>

                <div class="hidden md:block absolute right-0 top-0 -mt-8 z-0">
                    <svg width="600" height="500" viewBox="0 0 600 700" preserveAspectRatio="xMidYMid slice" class="w-[600px] h-[500px]">
                        <defs>
                            <clipPath id="ellipseClip3">
                                <ellipse cx="400" cy="250" rx="400" ry="250"/>
                            </clipPath>
                        </defs>
                        <image href="{{ asset('images/hero-slide3.png') }}" width="600" height="500" clip-path="url(#ellipseClip3)" preserveAspectRatio="xMidYMid slice" />
                        <ellipse cx="400" cy="250" rx="400" ry="250" fill="none" stroke="white" stroke-width="1" style="pointer-events: none;" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Pagination Bullets -->
        <div class="swiper-pagination bottom-5"></div>
    </div>
</section>