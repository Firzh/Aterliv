<footer class="bg-gray-900 text-white py-10 px-6">
  <div class="max-w-5xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-8">
    <!-- Kolom 1: Branding dan Social Media -->
    <div>
      <h2 class="text-xl font-bold mb-4 text-white">Återliv</h2>
      <div class="space-y-3 text-2xl">
        <div class="flex space-x-4">
          <a href="#" aria-label="Instagram" class="hover:text-orange-600"><i class="fab fa-instagram"></i></a>
          <a href="#" aria-label="LinkedIn" class="hover:text-indigo-600"><i class="fab fa-linkedin"></i></a>
          <a href="#" aria-label="YouTube" class="hover:text-red-600"><i class="fab fa-youtube"></i></a>
        </div>
        <div class="flex space-x-4">
          <a href="#" aria-label="Twitter" class="hover:text-blue-500"><i class="fab fa-twitter"></i></a>
          <a href="#" aria-label="WhatsApp" class="hover:text-green-600"><i class="fab fa-whatsapp"></i></a>
        </div>
      </div>
    </div>

    <!-- Kolom 2 -->
    <div>
      <h3 class="font-semibold mb-4 text-white">Återliv</h3>
      <ul class="space-y-1">
        <li><a href="#" class="text-white hover:text-gray-300">Tentang Kami</a></li>
        <li><a href="#" class="text-white hover:text-gray-300">Layanan</a></li>
        <li><a href="#" class="text-white hover:text-gray-300">Mitra</a></li>
        <li><a href="#" class="text-white hover:text-gray-300">Blog</a></li>
      </ul>
    </div>

    <!-- Kolom 3 -->
    <div>
      <h3 class="font-semibold mb-4 text-white">Informasi</h3>
      <ul class="space-y-1">
        <li><a href="#" class="text-white hover:text-gray-300">Kontak Kami</a></li>
        <li><a href="#" class="text-white hover:text-gray-300">Bantuan</a></li>
        <li><a href="#" class="text-white hover:text-gray-300">Syarat & Ketentuan</a></li>
        <li><a href="#" class="text-white hover:text-gray-300">Kebijakan Privasi</a></li>
      </ul>
    </div>

    <!-- Kolom 4 -->
    <div>
      <h3 class="font-semibold mb-4 text-white">Solusi Kami</h3>
      <ul class="space-y-1">
        <li><a href="#" class="text-white hover:text-gray-300">Everyone</a></li>
        <li><a href="#" class="text-white hover:text-gray-300">Business</a></li>
        <li><a href="#" class="text-white hover:text-gray-300">Corporate</a></li>
        <li><a href="#" class="text-white hover:text-gray-300">Smart City</a></li>
      </ul>
    </div>

    <!-- Kolom 5 -->
    <div>
      <h3 class="font-semibold mb-4 text-white">Download</h3>
      <div class="space-y-1">
        <img src="{{ asset('images/playstore-badge.png') }}" alt="Play Store" class="h-12">
        <img src="{{ asset('images/appstore-badge.png') }}" alt="App Store" class="h-12">
      </div>
    </div>
  </div>

  <!-- Teks bawah footer -->
  <div class="text-center mt-10 text-sm text-gray-400">
    &copy; {{ date('Y') }} ÅTERLIV
  </div>
</footer>
