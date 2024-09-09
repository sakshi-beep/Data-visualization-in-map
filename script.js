document.addEventListener("DOMContentLoaded", function() {
    var localMap = L.map('localMap').setView([27.7172, 85.3240], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(localMap);

    // Fetch the GeoJSON data from PHP
    fetch('fetch_map.php')
        .then(response => response.json())
        .then(data => {
            // Add the GeoJSON layer to the map
            L.geoJSON(data).addTo(localMap);
        })
        .catch(error => console.error('Error fetching GeoJSON:', error));

    document.getElementById('localLevelBtn').addEventListener('click', function() {
        document.getElementById('wardMap').classList.add('hidden');
        document.getElementById('localMap').classList.remove('hidden');
        // localMap.invalidateSize();
    });
});
