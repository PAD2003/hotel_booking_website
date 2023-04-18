<?php
    @include "../db_connect.php";
    @include 'function.php';
    session_start();
?>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="menu.css">
        <link rel="stylesheet" href="account.css">
        <link rel="stylesheet" href="hotel.css">
    </head>
    <body style="color: white;">
        <!-- HEADER -->
        <header class="block">
            <ul class="header-menu horizontal-list">
                <li>
                    <a class="header-menu-tab" href="updateAccount.php"><span class="icon fontawesome-user scnd-font-color"></span>Update</a>
                </li>
                <li>
                    <a class="header-menu-tab" href="reservations.php"><span class="icon fontawesome-star-empty scnd-font-color"></span>Your Reservations</a>
                </li>
                <li>
                    <a class="header-menu-tab" href="booking.php"><span class="icon fontawesome-envelope scnd-font-color"></span>Booking</a>
                </li>
                <li>
                    <a class="header-menu-tab" href="../account/logout.php"><span class="icon fontawesome-envelope scnd-font-color"></span>Log out</a>
                </li>
            </ul>
            <div class="profile-menu">
                <p><?php echo $_SESSION['cusName']; ?> <a href="#26"><span class="entypo-down-open scnd-font-color"></span></a></p>
            </div>
        </header>
        <div style="color:aliceblue; text-align:center" class="hotel">
        <?php 
            $test = $_SESSION['chosen_hotel_id'];
            $chosen_hotel_query = "SELECT * FROM Hotels WHERE hotelID = '$test'";
            $chosen_hotel_res = $conn->query($chosen_hotel_query);
            $chosen_hotel_row = mysqli_fetch_array($chosen_hotel_res);
            $map = $chosen_hotel_row['link_map'];
            $name = $chosen_hotel_row['hotelName'];
            echo "<h1>$name</h1><br>";
            

            $avilable_rooms = getAllRooms($test, $_SESSION['start_date'], $_SESSION['end_date']);


            echo "<form action=\"createReservations.php\" method=\"post\">";
            while ($row = mysqli_fetch_array($avilable_rooms)) {

                echo "<div><div class=\"bord\"><input type=checkbox name=\"chosen_rooms[]\" value=" . $row['roomID']  . ">
                Room number:  " . $row['roomID'] . "</div><div class=\"bord\">" .
                "Price Per Night: ". $row['price'] . "<br>" .
                "Capacity: " . $row['capacity'] . "</div>" .
                
                "</div><br>";
            };
            echo "<a href=\"reservations.php\"><input type=\"submit\" value=\"confirm\" name=\"newRes\"></a> <br>";
            echo "</form> <br>";

            // if(isset($_POST['chosen_rooms'])){
            //     // $_SESSION['chosen_hotel_id'] =  $_POST['chosen_hotel_id'];
            //     header('location:createReservations.php');
            // } else {
            //     echo "Please select at least 1 room";
            // }
            echo "<iframe src=\"https://www.google.com/maps/embed?pb={$map}\" width=\"900\" height=\"600\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>"
        ?>
        </div>
    </body>
</html>