<div id="map" style="height: 500px;" class="rounded shadow"></div>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    const map = L.map('map').setView([-7.3, 112.73], 12); // Fokus ke Surabaya

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    const locations = [
        {
            name: "Depo Sampah TPS Ketintang Baru",
            address: "Ketintang, Gayungan, Surabaya",
            lat: -7.323622459637044,
            lng: 112.7223055516
        },
        {
            name: "TPS 3R JAMBANGAN",
            address: "Jambangan, Surabaya",
            lat: -7.316386310336682,
            lng: 112.716426149359
        },
        {
            name: "BANK SAMPAH PESAPEN",
            address: "Lakarsantri, Surabaya",
            lat: -7.324218715069239,
            lng: 112.67864510824651
        },
        {
            name: "Bank Sampah Sektoral Anggrek",
            address: "Wiyung, Surabaya",
            lat: -7.313544076993834,
            lng: 112.6831014491794
        },
        {
            name: "TPS Prapen 88",
            address: "Tenggilis Mejoyo, Surabaya",
            lat: -7.3130297814323075,
            lng: 112.76024120331537
        },
        {
            name: "Bank Sampah Induk Surabaya",
            address: "Mulyorejo, Surabaya",
            lat: -7.276919043367128,
            lng: 112.77044296954703
        },
        {
            name: "TPS Gebang Putih",
            address: "Sukolilo, Surabaya",
            lat: -7.281644182360607,
            lng: 112.79483802439742
        },
        {
            name: "TPS Tambak Rejo",
            address: "Simokerto, Surabaya",
            lat: -7.239832137279768,
            lng: 112.7639472451307
        },
        {
            name: "TPST Siwalanpanji",
            address: "Buduran, Sidoarjo",
            lat: -7.433359971614529,
            lng: 112.74059893165345
        },
        {
            name: "Bank Sampah Desa Tenggulunan",
            address: "Candi, Sidoarjo",
            lat: -7.467425092999727,
            lng: 112.71836911822655
        },
        {
            name: "TPS 3R Janti",
            address: "Waru, Sidoarjo",
            lat: -7.347326646759077,
            lng: 112.7429085224088
        }
    ];

    let selectedMarker;

    locations.forEach(loc => {
        const marker = L.marker([loc.lat, loc.lng]).addTo(map);
        marker.bindPopup(`<strong>${loc.name}</strong><br>${loc.address}`);

        marker.on('click', function () {
            // Tandai marker yang sedang aktif
            if (selectedMarker) {
                selectedMarker.setIcon(new L.Icon.Default()); // reset icon
            }
            selectedMarker = marker;

            // Isi input hidden
            document.getElementById('latitude').value = loc.lat;
            document.getElementById('longitude').value = loc.lng;

            // Isi input tampilan
            document.getElementById('display_latitude').value = loc.lat;
            document.getElementById('display_longitude').value = loc.lng;
        });
    });
</script>