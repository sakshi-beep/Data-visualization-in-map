<?php
$host = "localhost";
$dbname = "gis";
$user = "postgres";
$password = "123456";

// Establish a connection to PostgreSQL using PDO
try {
    $conn = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to get the map data as GeoJSON
    $sql = 'SELECT ST_AsGeoJSON(ST_Simplify(geom, 0.001)) AS geojson FROM public."NepalLocalUnits0"';
    $stmt = $conn->query($sql);

    $features = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $features[] = json_decode($row['geojson']);
    }

    // Create a GeoJSON FeatureCollection
    $geojson = [
        'type' => 'FeatureCollection',
        'features' => array_map(function($geom) {
            return [
                'type' => 'Feature',
                'geometry' => $geom,
                'properties' => new stdClass()
            ];
        }, $features)
    ];

    // Output the GeoJSON
    header('Content-Type: application/json');
    echo json_encode($geojson);

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
