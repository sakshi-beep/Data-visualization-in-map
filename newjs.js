document.addEventListener("DOMContentLoaded", function() {
    // Initialize the map
    var map = L.map('map').setView([27.3949, 84.1240], 8); // Example coordinates for Nepal

    
    // Load GeoJSON data dynamically when the map is updated
    function loadGeoJson() {
        fetch('fetchmap.php')
            .then(response => response.json())
            .then(data => {
                L.geoJSON(data).addTo(map);  // Add GeoJSON data to the map
            })
            .catch(error => console.error('Error fetching GeoJSON:', error));
    }

    // Function to update the map with the view and zoom for different levels
    function updateMap(viewCoords, zoomLevel) {
        map.setView(viewCoords, zoomLevel);
        // map.invalidateSize(); // Force the map to fit inside its container
        loadGeoJson();
    }

    // Add event listeners for the buttons to switch between maps
    document.getElementById('localLevelBtn').addEventListener('click', function() {
        updateMap([27.7172, 85.3240], 100); // Adjust to Local Level
    });

    document.getElementById('wardLevelBtn').addEventListener('click', function() {
        updateMap([27.7, 85.3], 100); // Adjust to Ward Level
    });

    document.getElementById('provinceLevelBtn').addEventListener('click', function() {
        updateMap([27.5, 85.2], 100); // Adjust to Province Level
    });
});
