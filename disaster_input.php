<?php 

    if(isset($_POST['report'])) {
        require('./config/db.php');

        $incident_Date = filter_var($_POST["incident_Date"], FILTER_SANITIZE_STRING);
        $location = filter_var($_POST["location"], FILTER_SANITIZE_STRING);
        $casualties = filter_var($_POST["Casualties"], FILTER_SANITIZE_NUMBER_INT);
        $Incident_Type = filter_var($_POST["Incident_Type"], FILTER_SANITIZE_STRING);
        $description = filter_var($_POST["Description"], FILTER_SANITIZE_STRING);

        // echo $incident_Date . " " . $location . " " . $casualties . " " . $Incident_Type . " " . $description;

        $stmt = $pdo -> prepare('INSERT into incident(date, location, casualties, incident, description) VALUES(?, ?, ?, ?, ?)');
        $stmt -> execute([$incident_Date, $location, $casualties, $Incident_Type, $description]);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Disaster Input</title>
</head>
<body>
    <div class="container main">
        <div class="card">
            <div class="card-header">
                <h2 style="text-align: center;">Input Disaster</h2>
            </div>
            <div class="card-body">
                <form action="disaster_input.php" method="post">
                    <div class="row row_1">
                        <div class="col-6">
                            <label for="inputDate" class="form-label">Date</label>
                            <input type="date" name="incident_Date" id="inputDate" class="form-cntrol" required>
                        </div>
                        <div class="col-6">
                            <label for="inputLocation" class="form-label">Location</label> <br>
                            <input type="text" name="location" id="inputLocation" class="form-control" required>
                        </div>
                    </div>
                    <div class="row row_2">
                        <div class="col-6">
                            <label for="InputCasualties" class="form-label">Casualties</label>
                            <input type="number" name="Casualties" id="InputCasualties" class="form-control" required>
                        </div>
                        <div class="col-6">
                            <label for="InputType" class="form-label">Incident Type</label>
                            <select name="Incident_Type" id="InputType" class="form-select" required>
                                <option selected>Select Incident</option>
                                <option value="Earthquakes">Earthquakes</option>
                                <option value="Fire">Fire</option>
                                <option value="Floods">Floods</option>
                                <option value="Landslide">Landslides</option>
                                <option value="Road_Accident">Road Accident</option>
                                <option value="Structure_Collapse">Structure Collapse</option>
                                <option value="WIndstorm">WindStorm</option>
                                <option value="Thunderstorm">Thunderstorm</option>
                                <option value="Drought">Drought</option>
                            </select>
                        </div>
                    </div>
                    <label for="describeIncident" class="form-label">Incident Report</label>
                    <textarea name="Description" id="describeIncident" class="form-control" rows="7" required></textarea>
                    <button name="report" type="submit" class="btn btn-primary" style="margin-top: 10px;width: 100%;">Submit Incident</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>