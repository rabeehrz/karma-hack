<?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        $conn = mysqli_connect("localhost","root","password","data");
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        session_start();
        $_SESSION['id'] = 1;
        $sql = "SELECT * FROM users WHERE user_id = 1";
        $result = mysqli_query($conn, $sql);
         if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $_SESSION["tp"] = $row["points"];
                $tp = $_SESSION["tp"];
                $name = $row["name"];
                $phone = $row["phone"];
            }
         } else {
            echo "Error: " . $sql . "" . mysqli_error($conn);
         }
         
?>