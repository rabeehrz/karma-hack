<?php
include 'db.php';
if(!empty($_GET['latitude']) && !empty($_GET['longitude']) && !empty($_GET['note'])) {
    $latitude   = $_GET['latitude'];
    $longitude  = $_GET['longitude'];
    $note  = $_GET['note'];
    $time = substr(md5(time()),0,6);
    $sql = "INSERT INTO `location` (latitude,longitude,alert,code,note) VALUES ('".$latitude."','".$longitude."',2,'" . $time . "','" . $note . "')";

    if (mysqli_query($conn, $sql)) {
        $message = '</p>Your Alert have been added succesfully! Your rescue code is:</p><br><h2>' . $time .'</h2>';
    } else {
        echo "Error: " . $sql . "" . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="css/main.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
   integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
   crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
   integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
   crossorigin=""></script>
    <title>Orange Alert &bull; KARMA</title>
</head>
<body>
    <div class="wrapper">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.php">Profile</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="maps.php">Maps</a>
                    </li>
            </ul>
        </div>
        <a class="navbar-brand ml-auto" href="index.php"><b>KARMA</b></a>
        </nav>
        <?php
            if(isset($message)) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $message;?>
                    </div>
                <?php
            }
        ?>
        <div class="btncontainer">
        <h4 class="heading"><font color="orange">Orange Alert!</font></h4>
            <div id="mapid"></div><br>
            <form>
            <input type="text" id="note" class="note" placeholder="Enter note here"><br>
                <button id="submit" type="button" class="btn btn-primary">Submit</button>
            </form>
        </div>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
    navigator.geolocation.getCurrentPosition(function(location) {
    var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);
    var map = L.map('mapid').setView(latlng, 13);
    
    var lat;
    var lng;
    var marker;

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    
    $(document).ready(function(){
        $("#submit").click(function() {
            var note = document.getElementById('note').value
                    if (note == "") {
                        note = "None";
                    }
                    document.location.href = 'orgalert.php?latitude='+lat+'&longitude='+lng+'&note='+note;
        });
    });

        map.on('click', function(e){
                if(marker) {
                    map.removeLayer(marker);
                }
                var orangeIcon = new L.Icon({
                    iconUrl: 'img/marker-icon-2x-orange.png',
                    shadowUrl: 'img/marker-shadow.png',
                    iconSize: [25, 41],
                    iconAnchor: [12, 41],
                    popupAnchor: [1, -34],
                    shadowSize: [41, 41]
                });
                marker = new L.marker(e.latlng, {icon: orangeIcon}).addTo(map);
                var coord = e.latlng;
                lat = coord.lat;
                lng = coord.lng;
                console.log("You clicked the map at latitude: " + lat + " and longitude: " + lng);
         });
    });
    </script>
</body>
</html>