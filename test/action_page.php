<?php 
    include "connection.php";

    session_start();

    if(isset($_POST["email"]) and isset($_POST["password"])){
        $email = $_POST["email"];
        $pass = $_POST["password"];
        
        $sql = "SELECT email, password FROM user where email='$email' limit 1";
        $result = $conn->query($sql);
        $res = null;
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $res = $row["password"];
            }
            if($res == $pass){
                $_SESSION["user"] = $email;
                header("location:dashboard.php");
            }
            else{
                header("location:login.php?message=username or password is wrong");
            }
        } else {
            echo "Not registered !";
        }
        $conn->close();
    }
