<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GIS Data Visualization</title>
    <link rel="stylesheet" href="newcss.css">   <!-- Updated path -->
    <style>
        /* Single map container */
        
    </style>
</head>
<body>
    <header>
        <h1>GIS Data Visualization</h1>
    </header>

    <div class="container">
        <aside class="sidebar">
            <button id="localLevelBtn" class="map-btn">Local Level Map</button>
            <button id="wardLevelBtn" class="map-btn">Ward Level Map</button>
            <button id="provinceLevelBtn" class="map-btn">Province Level Map</button>
            
            <select id="dataSelect" class="dropdown">
                <option value="">Select Data</option>
                <option value="population">Population</option>
                <option value="landUse">Land Use</option>
                <option value="infrastructure">Infrastructure</option>
            </select>

            <input type="file" id="fileInput" class="file-input" />

            <div id="legend" class="legend">
                <h3>Legend</h3>
                <p><span class="point"></span> Settlement Area</p>
                <p><span class="line"></span> Roads</p>
                <p><span class="polygon"></span> Land Parcels</p>
            </div>
        </aside>

        <main class="map-container">
            <div id="map"></div> <!-- Single Map Container -->
        </main>
    </div>

    <!-- Link the local Leaflet JS file -->
    <script src="css/leaflet/leaflet.js"></script>

    <!-- <script>
        // Initialize the map in the single container
        var map = L.map('map').setView([27.7172, 85.3240], 8); // Nepal coordinates

        // Add the OpenStreetMap tile layer (default view)
        // var baseLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        //     attribution: '&copy; OpenStreetMap contributors'
        // }).addTo(map);

        // Function to update the map view
        function updateMap(viewCoords, zoomLevel) {
            map.setView(viewCoords, zoomLevel);  // Update the view
            map.eachLayer(function(layer) {
                if (layer != baseLayer) {
                    map.removeLayer(layer);  // Remove any existing GeoJSON layers
                }
            });
        }

        // Event listeners for buttons
        document.getElementById('localLevelBtn').addEventListener('click', function() {
            updateMap([27.7172, 85.3240], 10); // Local level view (change coords as needed)
            loadGeoJson(); // Load GeoJSON data for local level
        });

        document.getElementById('wardLevelBtn').addEventListener('click', function() {
            updateMap([27.7, 85.3], 12); // Ward level view (change coords as needed)
            loadGeoJson(); // Load GeoJSON data for ward level
        });

        document.getElementById('provinceLevelBtn').addEventListener('click', function() {
            updateMap([27.5, 85.2], 8); // Province level view (change coords as needed)
            loadGeoJson(); // Load GeoJSON data for province level
        });

        // Function to load GeoJSON data (same function can be reused for different maps)
        function loadGeoJson() {
            fetch('fetchmap.php')
                .then(response => response.json())
                .then(data => {
                    L.geoJSON(data).addTo(map); // Add GeoJSON layer to the map
                })
                .catch(error => console.error('Error loading GeoJSON:', error));
        }
    </script> -->

    <!-- Your custom script -->
    <script src="newjs.js"></script>
</body>
</html>
