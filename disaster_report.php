<?php 

    require('./config/db.php');

    // $stmt = $pdo->prepare('SELECT * FROM incident');
    // $stmt->execute();

    // $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt = $pdo->query('SELECT COUNT(*) FROM incident');
    $totalIncidents = $stmt->fetchColumn();

    $incidentNumber = isset($_GET['id']) ? intval($_GET['id']) : 1;

    $incidentNumber - max(1, min($totalIncidents, $incidentNumber));

        $stmt = $pdo->prepare('SELECT * FROM incident WHERE id = ?');
        $stmt->execute([$incidentNumber]);
        $incident = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($incident) {

    

  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Disaster Report</title>
</head>
<body>
    <div class="container main">
        <div class="card">
            <div class="card-header" style="display: flex;">
                <h2>Disaster Type: </h2>
                <p style="padding: 10px"> <?php echo "{$incident['incident']}"; ?> </p>
            </div>
            <div class="card-body">
                <div class="body-content" style="display: flex;">
                    <h5>Disaster Date: </h5>
                    <p style="padding: 5px;"> <?php echo "{$incident['date']}"; ?> </p>
                </div>
                <div class="body-content" style="display: flex;">
                    <h5>Location: </h5>
                    <p style="padding: 5px;"> <?php echo "{$incident['location']}"; ?> </p>
                </div>
                <div class="body-content" style="display: flex;">
                    <h5>Number of Casualties: </h5>
                    <p style="padding: 5px;"> <?php echo "{$incident['casualties']}"; ?> </p>
                </div>
                <div class="body-content">
                    <h5>Incident Report: </h5>
                    <p> <?php echo "{$incident['description']}"; ?> </p>
                </div>
            <?php 

                $prevIncident = max(1, $incidentNumber - 1);
                $nextIncident = min($totalIncidents, $incidentNumber + 1);

             ?> 
            <button><?php echo "<a href='?id=$prevIncident'>Previous Incident"; ?></button>
            <button><?php echo "<a href='?id=$nextIncident'>Next Incident"; ?></button>
            </div>
        </div>
    </div>
</body>
</html>

<?php     } else {
    echo "No incident found with the specified number";
}
?>