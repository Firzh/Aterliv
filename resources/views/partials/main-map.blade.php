<div id="map" style="height: 500px;"></div>

<!-- Leaflet CSS & JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<!-- OpenRouteService -->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
    const map = L.map('map').setView([-6.200000, 106.816666], 12); // Default ke Jakarta

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // Contoh marker lokasi daur ulang (Anda bisa ubah/loop dari data dinamis)
    const sampleLocations = [
        { lat: -6.2, lng: 106.82, name: "Bank Sampah A" },
        { lat: -6.22, lng: 106.85, name: "Bank Sampah B" }
    ];

    sampleLocations.forEach(loc => {
        L.marker([loc.lat, loc.lng]).addTo(map)
            .bindPopup(loc.name);
    });

    // Rute bisa ditambahkan dengan OpenRouteService di sini
    // Contoh: 
    /*
    const apiKey = "5b3ce3597851110001cf624832a39a889a134d0283b9a3d92a9208bf";
    axios.post(`https://api.openrouteservice.org/v2/directions/driving-car`, {
        coordinates: [[106.816666, -6.200000], [106.85, -6.22]]
    }, {
        headers: {
            'Authorization': apiKey,
            'Content-Type': 'application/json'
        }
    }).then(response => {
        const coords = response.data.features[0].geometry.coordinates.map(c => [c[1], c[0]]);
        L.polyline(coords, { color: 'blue' }).addTo(map);
    });
    */
</script>
