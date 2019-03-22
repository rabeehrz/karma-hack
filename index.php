<?php
include 'db.php';
if(!empty($_POST['code'])){
    $code   = $_POST['code'];
    $co = 0;
    $sql = "SELECT * FROM location WHERE fulfilled = 0";
        $result = mysqli_query($conn, $sql);
         if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                if($row["code"] == $code){
                    unset($co);
                    $points = 0;
                    if($row["alert"] == 3) {
                        $points = 5;
                    } elseif($row["alert"] == 2) {
                        $points = 3;
                    } else{
                        $points = 2;
                    }
                    $n = $tp+$points;
                    $sql2 = "UPDATE users SET points = '". $n ."' WHERE user_id = 1";
                    if(mysqli_query($conn, $sql2)){ 
                        $message = '<p>You have succesfully gained <strong>' . $points . ' karma</strong>. Your current karma is: <strong>' . $n . '</strong</p>';
                    } else { 
                        echo "ERROR: Could not able to execute $sql2. "  
                                                . mysqli_error($conn); 
                    }
                    $sql3 = "UPDATE location SET fulfilled = 1, fulfilled_by = 1 WHERE code = '". $code ."'";
                    if(mysqli_query($conn, $sql3)){ 
                        
                    } else { 
                        echo "ERROR: Could not able to execute $sql3. "  
                                                . mysqli_error($conn); 
                    }    
                }
            }
         } else {
            $invalid = 1;
         }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="css/main.css" type="text/css" rel="stylesheet" />
    <title>Home &bull; KARMA</title>
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
        </button>
        </nav>
        <?php
            if(isset($message)) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $message;?>
                    </div>
                <?php
            }
            if(isset($co)) {
                ?>
                    <div class="alert alert-danger" role="alert"><h3>Invalid Code!</h3></div>
                <?php
            }
        ?>
        <div class="btncontainer">
            <h4 class="heading">Select your Alert Level!</h4>
            <a href="redalert.php"><button type="button" class="btn btn-danger btn-lg btn-block">Red Alert</button></a><br>
            <a href="orgalert.php"><button type="button" class="btn btn-orange btn-lg btn-block">Orange Alert</button></a><br>
            <a href="yelalert.php"><button type="button" class="btn btn-warning btn-lg btn-block">Yellow Alert</button></a><br>
            <form action="index.php" method="post">
            <div class="form-group">
            <input type="text" class="form-control" placeholder="Enter rescue code to redeem KARMA" name="code"><br>
            <input class="btn btn-primary" type="submit" value="Redeem">
        </div>
        </form>
        </div>
       
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>