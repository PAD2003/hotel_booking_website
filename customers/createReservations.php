<?php
    session_start();
    include "../db_connect.php";

    if (isset($_POST['newRes']) && isset($_POST['chosen_rooms'])) {
        // RESERVATIONS
        $checkInDate = $_SESSION['start_date'];
        $checkOutDate = $_SESSION['end_date'];
        $today = date("Y-m-d");
        $cusID = $_SESSION['cusID'];

        $hotelID = $_SESSION['chosen_hotel_id'];
        $staff = "staff";

        // find empID for new reservations
        $sql = "SELECT count(resID) as count, e.*, r.*
                from employees e
                left join reservations r
                on e.empID = r.Employees_empID
                where e.Hotels_hotelID = '$hotelID' 
                and e.position = '$staff'
                and (r.resID is null or checkOutDate > date($today))
                group by empID
                order by count
                limit 1";
        $result = $conn->query($sql);
        //echo $sql;
        $row = $result->fetch_assoc();
        $empID = $row['empID'];
        //echo $empID;

        // create
        $sql = "INSERT INTO Reservations (checkInDate, checkOutDate, reservedDate, Employees_empID, Customers_cusID) 
                VALUES ('$checkInDate', '$checkOutDate', '$today', '$empID', '$cusID')";
        echo $sql;
        $result = $conn->query($sql);

        $resID = mysqli_insert_id($conn);
        echo $resID;

        foreach($_POST['chosen_rooms'] as $roomID) {
            echo $roomID;
            $sql = "INSERT INTO Rooms_has_reservations (Rooms_roomID, Rooms_Hotels_hotelID, Reservations_resID) 
                    VALUES ('$roomID', '$hotelID', '$resID')";
            $result = $conn->query($sql);
            echo "<br>" . $sql;
        }
        header("location:reservations.php");
        }
else {
    echo "hi";
}