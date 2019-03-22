<?php
include 'db.php'
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="css/main.css" type="text/css" rel="stylesheet" />
	<link href="css/s.css" type="text/css" rel="stylesheet" />
	<style>
	h1{text-align:center;}
	p{text-align:center;}
	img{margin: 0 auto;}
	select {
		width: 100%;
		padding: 16px 20px;
		border: none;
		border-radius: 4px;
		background-color: #f1f1f1;	
	}
	.wrapper {
		text-align: center;
	}

	.button {
		background-color: #ff9933;
		border: none;
		color: white;
		padding: 15px 32px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
	}
	/* body{
		background-color: #343A40;
		} */
	.wrapper{
		background-color: white;
		padding: 0;
		}
	ul {
		display: block;
		list-style-type: none;
		margin: 0;
		padding: 0;
		}
	</style>
    <title>Redeem &bull; KARMA</title>
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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
		</nav>
        <div class="btncontainer">
            <p style = "text-align: center;"><img src = "https://upload.wikimedia.org/wikipedia/commons/thumb/1/17/Yin_yang.svg/260px-Yin_yang.svg.png" height = "100" width = "100"></p>
			<h1>Your current Karma: <?php echo $tp;?></h1>
			<p> Select mode of redeeming: </p>
			<div class = "Wrapper">
				<button class = "button" onclick="Gov()">Government subsidies</button>
				<button class = "button" onclick="Priv()">Private subsidies</button>
			<p id = "demo"></p>
			<script>
				function Gov(){
					document.getElementById("demo").innerHTML = `Subsidy percentage: 2%`;
					}
				function Priv(){
					document.getElementById("demo").innerHTML = `Subsidy percentage: 5%`;
					}
			</script>
			<a link href="#"><button type="button" class="btn btn-success btn-lg">Redeem</button></a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>