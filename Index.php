<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GIS Data Visualization</title>
    <link rel="stylesheet" href="css/leaflet.css"> <!-- Updated path -->
    <link rel="stylesheet" href="styles.css">   <!-- Updated path -->
</head>
<body>
    <header>
        <h1>GIS Data Visualization</h1>
    </header>
<form action="fetchmap.php" method="post">
    <div class="container">
        <aside class="sidebar">
            <button id="localLevelBtn" class="map-btn">Local Level Map</button>
            <button id="wardLevelBtn" class="map-btn">Ward Level Map</button>
            <radio id="provincelevel" class="map-btn"> Province level map </radio>
            
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
                <p><span class="line"></span>Roads</p>
                <p><span class="polygon"></span> Land Parcels</p>
            </div>
        </aside>

        <main class="map-container">
    <div id="localMap" class="map hidden"></div> <!-- Local Level Map -->
    <div id="wardMap" class="map hidden"></div>  <!-- Ward Level Map (if needed) -->
</main>
    </div>
    <script src="Css/leaflet/leaflet.js"></script>
    <script>
    var map = L.map('map').setView([27.7172, 85.3240], 8); // Example coordinates (Nepal)

        // Add the OpenStreetMap tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Fetch the GeoJSON data from the server (from fetch_map.php)
        fetch('fetch_map.php')
            .then(response => response.json())
            .then(data => {
                // Add the GeoJSON layer to the map
                L.geoJSON(data).addTo(map);
            })
            .catch(error => console.error('Error loading GeoJSON data:', error));
    </script>

    <script src="script.js"></script> <!-- Updated path -->
       <!-- Assuming your custom JS is in a 'js' folder -->
</body>
</html>
