@extends('layouts.guest')

@section('content')

<section class="bg-white py-8 md:py-12" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
    <div class="max-w-7xl mx-auto px-4 md:px-8 text-center">
        {{-- Moved logo here, closer to the heading --}}
        <a href="{{ url('/') }}" aria-label="Home Page" class="inline-block mb-4"> {{-- Added margin-bottom and made it inline-block for centering --}}
            <img src="{{ asset('images/LATERLIV.png') }}" alt="Återliv Logo - Go to homepage"
                 class="h-24 w-24 md:h-32 md:w-32 object-contain transition-transform duration-300 hover:scale-110 active:scale-95 mx-auto" data-aos="zoom-in" data-aos-delay="200"> {{-- Increased size slightly, added mx-auto for centering, and AOS --}}
        </a>

        <h1 class="text-5xl lg:text-6xl font-extrabold text-green-700 leading-tight mb-6" data-aos="fade-up" data-aos-delay="300">
            Selamat Datang di <span class="text-green-500">Återliv</span>: Revitalisasi Lingkungan Kita!
        </h1>
        <p class="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto mb-10 leading-relaxed" data-aos="fade-up" data-aos-delay="500">
            Platform edukasi dan kontribusi lingkungan yang inovatif untuk membangun masa depan yang benar-benar berkelanjutan 🌍. Kami memiliki keyakinan kuat bahwa setiap individu memiliki kekuatan untuk menciptakan perubahan positif, dimulai dari langkah-langkah kecil di rumah sendiri.
        </p>
        <img src="{{ asset('images/daur ulang.jpg') }}" alt="Ilustrasi Daur Ulang Modern" class="w-full max-w-lg mx-auto mb-10 rounded-xl shadow-2xl transform hover:scale-105 transition-transform duration-500 ease-in-out" data-aos="zoom-in" data-aos-delay="700">
        <p class="text-sm text-gray-500 mt-4" data-aos="fade-up" data-aos-delay="900">Bersama, kita bisa mengubah kebiasaan dan merestorasi bumi.</p>
    </div>
</section>

<section class="bg-green-50 py-16 border-t border-b" data-aos="fade-up" data-aos-offset="50">
    <div class="max-w-4xl mx-auto px-4 md:px-8 text-center">
        <blockquote class="text-2xl italic text-green-800 font-medium leading-relaxed" data-aos="fade-right">
            “Kita tidak mewarisi bumi dari nenek moyang kita, kita meminjamnya dari anak cucu kita. Mari kita jaga bersama.”
        </blockquote>
        <p class="mt-4 text-gray-700 text-base font-semibold" data-aos="fade-left" data-aos-delay="200">– Pepatah Bijak Pribumi Amerika</p>
    </div>
</section>

<section class="bg-white py-24 md:py-32 border-t">
    <div class="max-w-7xl mx-auto px-4 md:px-8 grid grid-cols-1 md:grid-cols-2 items-center gap-16">
        <div data-aos="fade-right" data-aos-offset="150">
            <img src="{{ asset('images/daur ulang2.jpg') }}" alt="Misi Daur Ulang Global"
                 class="w-full max-w-md mx-auto md:mx-0 rounded-2xl shadow-xl transform hover:rotate-3 transition-transform duration-500 ease-in-out">
        </div>
        <div data-aos="fade-left" data-aos-offset="150" data-aos-delay="200">
            <h2 class="text-4xl lg:text-5xl font-bold text-green-700 mb-6 leading-tight">Mewujudkan Akses Daur Ulang yang Inklusif untuk Semua</h2>
            <p class="text-gray-700 text-lg mb-4 leading-relaxed">Setiap tahun, sayangnya jutaan ton sampah berharga berakhir di tempat pembuangan akhir dan belum sempat terdaur ulang. Namun, kami percaya bahwa solusi fundamental sudah tersedia dan menanti di sekitar kita. Dengan memadukan teknologi canggih dan semangat kolaborasi yang kuat, kita bisa membangun sistem daur ulang yang jauh lebih efisien, adil, dan ramah lingkungan bagi semua.</p>
            <p class="text-gray-700 text-lg leading-relaxed">
                Melalui kemitraan strategis dengan para pengepul lokal dan komunitas, Återliv berkomitmen untuk menjembatani kesenjangan antara masyarakat dan ekosistem ekonomi sirkular yang adil dan berdaya. Kami hadir sebagai platform yang memastikan setiap individu memiliki kesempatan yang sama untuk berpartisipasi aktif dalam upaya vital menyelamatkan planet bumi kita tercinta.
            </p>
        </div>
    </div>
</section>

<section class="bg-green-50 py-24 md:py-32 border-t" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-4 md:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-green-700 mb-4" data-aos="fade-up" data-aos-delay="100">Dampak Nyata Komunitas Återliv</h2>
        <p class="text-gray-600 text-base md:text-lg max-w-2xl mx-auto mb-12 leading-relaxed" data-aos="fade-up" data-aos-delay="200">
            Di Återliv, kami tidak hanya berbicara; kami bertindak. Kami sangat percaya pada kekuatan <span class="font-medium text-green-600">data konkret</span> dan <span class="font-medium text-green-600">aksi nyata</span> yang terukur.
            Berikut adalah gambaran kontribusi luar biasa dari komunitas Återliv yang terus tumbuh dan memberikan dampak positif:
        </p>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-10 text-green-600 text-4xl font-bold">
            <div class="bg-white p-8 rounded-xl shadow-lg border border-green-100 transform hover:scale-105 transition-transform duration-300" data-aos="zoom-in" data-aos-delay="300">
                <div class="text-5xl mb-3">🧺</div>
                <p class="text-4xl lg:text-5xl">3.2 Juta+</p>
                <span class="text-base font-medium text-gray-600 mt-2 block">Jaringan Pengepul & Pemulung</span>
            </div>
            <div class="bg-white p-8 rounded-xl shadow-lg border border-green-100 transform hover:scale-105 transition-transform duration-300" data-aos="zoom-in" data-aos-delay="450">
                <div class="text-5xl mb-3">👥</div>
                <p class="text-4xl lg:text-5xl">10.000+</p>
                <span class="text-base font-medium text-gray-600 mt-2 block">Anggota Komunitas Aktif</span>
            </div>
            <div class="bg-white p-8 rounded-xl shadow-lg border border-green-100 transform hover:scale-105 transition-transform duration-300" data-aos="zoom-in" data-aos-delay="600">
                <div class="text-5xl mb-3">♻️</div>
                <p class="text-4xl lg:text-5xl">120+ Ton</p>
                <span class="text-base font-medium text-gray-600 mt-2 block">Sampah Berhasil Terdokumentasi</span>
            </div>
        </div>
        <p class="text-gray-500 text-sm mt-10" data-aos="fade-up" data-aos-delay="750">Data ini terus bertambah seiring dengan partisipasi Anda. Mari ciptakan dampak yang lebih besar!</p>
    </div>
</section>


<section class="bg-white py-24 md:py-32 border-t">
    <div class="max-w-7xl mx-auto px-4 md:px-8">
        <h2 class="text-3xl md:text-4xl font-bold text-green-700 text-center mb-14" data-aos="fade-down">Mengapa Memilih Återliv sebagai Mitra Lingkungan Anda?</h2>
        <p class="text-center text-gray-600 mb-12 max-w-2xl mx-auto leading-relaxed" data-aos="fade-down" data-aos-delay="100">
            Återliv lebih dari sekadar platform digital; kami adalah sebuah gerakan progresif yang berdedikasi untuk membentuk kebiasaan baru yang lebih ramah lingkungan dan berkelanjutan. Kami menawarkan beragam fitur unggulan yang dirancang khusus untuk memfasilitasi dan mendukung Anda dalam setiap tahapan perjalanan perubahan menuju gaya hidup yang lebih hijau.
        </p>
        <div class="grid md:grid-cols-3 gap-8">
            @foreach([
                ['icon' => '📚', 'title' => 'Edukasi Interaktif & Mudah Dipahami', 'desc' => 'Dapatkan akses ke panduan langkah-demi-langkah, video tutorial yang menarik, dan artikel informatif tentang cara memilah serta mengelola sampah dengan benar. Semua disajikan dengan visual yang memikat dan penjelasan yang mudah dipahami oleh siapa saja, bahkan bagi pemula.'],
                ['icon' => '🆓', 'title' => 'Akses Gratis & Tanpa Batasan', 'desc' => 'Nikmati semua fitur Återliv secara gratis di berbagai perangkat favorit Anda—mulai dari smartphone hingga komputer. Kami menghilangkan semua hambatan agar Anda bisa segera memulai aksi nyata tanpa biaya tersembunyi.'],
                ['icon' => '🏆', 'title' => 'Poin Kontribusi & Penghargaan Menarik', 'desc' => 'Setiap aksi daur ulang yang Anda lakukan di Återliv akan dihitung dan memberikan Anda poin kontribusi. Kumpulkan poin sebanyak-banyaknya untuk mendapatkan reward eksklusif dan berbagai manfaat menarik. Semakin sering Anda berkontribusi, semakin besar pula dampak positif yang Anda ciptakan dan keuntungan yang Anda dapatkan!']
            ] as $index => $fitur)
            <div class="bg-green-50 hover:scale-[1.03] transition transform duration-300 p-8 rounded-2xl shadow-lg border border-green-100 text-center cursor-pointer" data-aos="flip-up" data-aos-delay="{{ 200 * ($index + 1) }}">
                <div class="text-4xl mb-4">{{ $fitur['icon'] }}</div>
                <h3 class="text-xl font-semibold text-green-800 mb-3">{{ $fitur['title'] }}</h3>
                <p class="text-gray-600 leading-relaxed">{{ $fitur['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="bg-green-50 py-24 md:py-32 text-green-800" data-aos="fade-up">
    <div class="max-w-3xl mx-auto px-6 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6" data-aos="fade-up" data-aos-delay="100">Siap Membuat Perubahan? Gabung Sekarang dengan Återliv!</h2>
        <p class="text-lg mb-8 leading-relaxed" data-aos="fade-up" data-aos-delay="200">Jangan tunda lagi! Mulai kontribusimu yang berarti untuk bumi kita tercinta. Cukup login atau daftar, dan mari kita beraksi bersama. Ingatlah, setiap langkah kecil yang Anda ambil hari ini dapat berdampak besar bagi lingkungan di masa depan.</p>
        <div class="flex flex-col sm:flex-row justify-center items-center gap-4" data-aos="fade-up" data-aos-delay="300">
            <a href="{{ route('login') }}"
               class="px-8 py-4 rounded-full bg-green-600 text-white hover:bg-green-700 text-base font-semibold shadow-xl transition-all duration-300 transform hover:scale-105">
                Masuk ke Akun Anda
            </a>
            <a href="{{ route('google.login') }}"
               class="px-8 py-4 rounded-full bg-green-500 text-white hover:bg-green-600 border-2 border-green-500 text-base font-semibold shadow-xl transition-all duration-300 transform hover:scale-105">
                Lanjutkan dengan Google
            </a>
        </div>
    </div>
</section>

@endsection