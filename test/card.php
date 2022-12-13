<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="cards">

            <?php
             $conn = mysqli_connect("localhost", "root", "", "auction_articles");
             if ($conn->connect_error) {
                 die("Connection Failed: " . $conn->connect_error);
             }
             $sql = "SELECT Number, Type, Karratage, Weight, Date FROM articles";
             $result = $conn->query($sql);

             if ($result->num_rows > 0) {
               while ($row = $result->fetch_assoc()) {
                $f1 = $row["Number"];
                $f2 = $row["Type"];
                $f3 = $row["Karratage"];
                $f4 = $row["Weight"];
                $f5 = $row["Date"];
                echo "
                <div class='card'>
                    <img src='img/bar1.jpg' alt='trouser'>
                    <div class=content>
                        <h2>Article No:  $f1 </h2><i>Category:  $f2 </i><i>Karatage:  $f3 </i><i>Weight( g ):  $f4 </i><i>Date: $f5 </i>
                    </div>
                
                <div class=more>
                    <a href=url>View Article</a>
                </div>
                </div>
                ";
            }
        } else {
            echo "0 result";
        }
        
        $conn->close();
        ?>
    </div>
</body>

</html>