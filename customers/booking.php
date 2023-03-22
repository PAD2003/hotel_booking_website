<?php
    session_start();

    if (isset($_SESSION['cusID'])) {
        include "../db_connect.php";

        $sql = "SELECT * FROM Hotels";

        $result = $conn->query($sql);

        if ($result == false) {
            echo "fail query";
            exit();
        }
?>

<html>
        <head>
            <link rel="stylesheet" href="menu.css">

            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
            <link href="https://repo.rachmat.id/jquery-ui-1.12.1/jquery-ui.css" rel="stylesheet">
            <script type="text/javascript" src="https://repo.rachmat.id/jquery-1.12.4.js"></script>
            <script type="text/javascript" src="https://repo.rachmat.id/jquery-ui-1.12.1/jquery-ui.js"></script>
            <!-- <link href="booking.css" rel="stylesheet"> -->
            <script src="script.js"></script>
        </head>

        <body>
            <div class="main-container">
                <header class="block">
                    <ul class="header-menu horizontal-list">
                        <li>
                            <a class="header-menu-tab" href="home.php"><span class="icon fontawesome-user scnd-font-color"></span>Home</a>
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
            <!-- </div>

            <div class="container"> -->
            <body>
                
                <form action = "" method = "post">
                    <fieldset>
                        <legend>New Reservations</legend>

                        Hotel:
                        <select name="hotelID" id="hotelID">
                            <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                            ?>
                                        <option value="<?php echo $row['hotelID']?>"><?php echo $row['hotelName'] ?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                        <br>

                        Check In:
                        <input type="text" name="date1" id="datepicker1">
                        <br>

                        Check Out:
                        <input type="text" name="date2" id="datepicker2">
                        <br> <br>

                        <input type = "submit" value = "View Rooms" name = "viewRooms">

                    </fieldset>
                </form>
            </body>

                <?php
                    if (isset($_POST['viewRooms'], $_POST['date1'], $_POST['date2'])) { 
                        $date1 = date("Y-m-d", strtotime($_POST['date1']));
                        $date2 = date("Y-m-d", strtotime($_POST['date2']));
                        if ($date1 >= $date2) {
                ?>
                            You need to select the check in date before the check out date
                <?php
                        } else if ($date1 < date("Y-m-d")) {
                ?>
                            You need to select the check in date after today
                <?php
                        } else {
                            $_SESSION['error'] = "";
                            $_SESSION['date1'] = $date1;
                            $_SESSION['date2'] = $date2;

                            $hotelID = $_POST['hotelID'];
                            $_SESSION['hotelID'] = $hotelID;

                            $sql = "SELECT *
                                    from rooms
                                    where hotels_hotelID = '$hotelID'
                                    and (roomID, hotels_hotelID) not in
                                    (select rooms_roomID, Rooms_Hotels_hotelID
                                    from rooms_has_reservations
                                    where reservations_resID in
                                    (select resID 
                                    from Reservations
                                    where ('$date1' <= checkInDate and checkInDate <= '$date2')
                                    or ('$date1' <= checkOutDate and checkOutDate <= '$date2')))";

                            $result = $conn->query($sql);
                            if ($result->num_rows == 0) {
                ?>
                                There are no rooms left. Please try again!
                <?php
                            } else {
                ?>
                                <form action = "" method = "post">
                                    <link rel="stylesheet" href="table.css">
                                    <table class="container">
                                        <thead>
                                            <tr>
                                                <th><h1>Room ID</h1></th>
                                                <th><h1>Price</h1></th>
                                                <th><h1>Type</h1></th>
                                                <th><h1>Book</h1></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                            ?>

                                                        <tr>
                                                            <td><?php echo $row['roomID']; ?> </td>
                                                            <td><?php echo $row['price']; ?> </td>
                                                            <td><?php echo $row['type']; ?> </td>
                                                            <td>
                                                                <input type = "radio" name = "<?php echo $row['roomID'] ?>" value="selected" unchecked> selected
                                                                <input type = "radio" name = "<?php echo $row['roomID'] ?>" value="unselected" checked> unselected
                                                            </td>
                                                        </tr>
                                            <?php 
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                
                                    <input type = "submit" value = "New Reservations" name = "newRes" formaction="createReservations.php">
                                <form action = "" method = "post">
                                
                                            
                <?php
                            }
                        }
                    }
                ?>
                
            </div>
        </body>
</html>



<?php
    } else {
        header("Location: ../index.php");
        exit();
    }
?>

        