<?php
    @include "../db_connect.php";
    @include 'function.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="main_theme.css">
</head>
<body>

    <?php 
        $test = $_SESSION['chosen_hotel_id'];
        $chosen_hotel_query = "SELECT * FROM Hotels WHERE hotelID = '$test'";
        $chosen_hotel_res = $conn->query($chosen_hotel_query);
        $chosen_hotel_row = mysqli_fetch_array($chosen_hotel_res);


        $avilable_rooms = getAllRooms($test, $_SESSION['start_date'], $_SESSION['end_date']);

        echo "<form action=\"createReservations.php\" method=\"post\">";
        while ($row = mysqli_fetch_array($avilable_rooms)) {

            echo "<div><div class=\"bord\"><input type=checkbox name=\"chosen_rooms[]\" value=" . $row['roomID']  . ">
            Room number:  " . $row['room_no'] . "</div><div class=\"bord\">" .
            "Price Per Night: ". $row['price_per_night'] . "<br>" .
            "Capacity: " . $row['no_of_people'] . "</div>" .
            
            "</div><br>";
        };
        echo "<input type=\"submit\" value=\"confirm\" name=\"newRes\">";
        echo "</form>";

        // if(isset($_POST['chosen_rooms'])){
        //     // $_SESSION['chosen_hotel_id'] =  $_POST['chosen_hotel_id'];
        //     header('location:createReservations.php');
        // } else {
        //     echo "Please select at least 1 room";
        // }
    ?>
</body>
</html>