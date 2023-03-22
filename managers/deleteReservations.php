<?php
    session_start();

    include "../db_connect.php";

    if (isset($_GET['id'])) {

        $resID = $_GET['id'];

        

        // ROOMS_HAS_RESERVATIONS

        $sql = "DELETE FROM rooms_has_reservations WHERE Reservations_resID = '$resID'";

        $result = $conn->query($sql);

        if ($result == TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error: ".$sql."<br>".$conn->error;
        }

        // RESERVATIONS

        $sql = "DELETE FROM reservations WHERE resID = '$resID'";

        $result = $conn->query($sql);

        if ($result == TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error: ".$sql."<br>".$conn->error;
        }

        // Back to view reservations
        header("Location: reservations.php?");
        exit();
        
    }
