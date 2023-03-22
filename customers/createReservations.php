<?php
    session_start();
    include "../db_connect.php";

    if (isset($_POST['newRes'])) {

        // get rooms for reservations
        $rooms = array();
        foreach ($_POST as $key => $value) {
            if ($value == "selected") {
                array_push($rooms, $key);
            }
        }

        if (sizeof($rooms) == 0) {
            // no rooms
            header("Location: reservations.php?error=Pick no rooms");
            exit();
        }
        

        // RESERVATIONS
        $checkInDate = $_SESSION['date1'];
        $checkOutDate = $_SESSION['date2'];
        $today = date("Y-m-d");
        $cusID = $_SESSION['cusID'];

        $hotelID = $_SESSION['hotelID'];
        $staff = "staff";

        // find empID for new reservations
        $sql = "SELECT count(resID) as count, e.*, r.*
                from employees e
                left join reservations r
                on e.empID = r.Employees_empID
                where e.Hotels_hotelID = '$hotelID' 
                and e.position = '$staff'
                and (r.resID is null or checkOutDate > '$today')
                group by empID
                order by count
                limit 1;";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $empID = $row['empID'];

        // create
        $sql = "INSERT INTO Reservations (checkInDate, checkOutDate, reservedDate, Employees_empID, Customers_cusID) 
                VALUES ('$checkInDate', '$checkOutDate', '$today', '$empID', '$cusID')";
        $result = $conn->query($sql);

        // ROOMS_HAS_RESERVATIONS
        // get resID
        $sql = "SELECT max(resID) as max_resID from reservations;";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $resID = $row['max_resID'];

        foreach($rooms as $roomID) {
            $sql = "INSERT INTO Rooms_has_reservations (Rooms_roomID, Rooms_Hotels_hotelID, Reservations_resID) 
                    VALUES ('$roomID', '$hotelID', '$resID')";
            $result = $conn->query($sql);
        }

        header("Location: reservations.php?error=here");
        exit();
    }