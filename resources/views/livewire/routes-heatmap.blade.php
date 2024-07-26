<div id="map" style="width: 100%; height: 500px;"></div>

<!-- Incluye Leaflet.js -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<!-- Incluye Leaflet.heat -->
<script src="https://unpkg.com/leaflet.heat/dist/leaflet-heat.js"></script>

<script>
    document.addEventListener('livewire:load', function () {
        var map = L.map('map').setView([0, 0], 2);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        var heat = L.heatLayer(@json($heatmapData), {radius: 25}).addTo(map);
    });
</script>
