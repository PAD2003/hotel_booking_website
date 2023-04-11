<?php

function createHotelsSelection($hotels, $start_date, $end_date) {
    include "../db_connect.php";
    while ($row = mysqli_fetch_array($hotels)) {

        $available_rooms = getAllRooms($row['hotelID'], $start_date, $end_date);

        $rooms_left = 0;
        $capacity = 0;

        while ($rrow = mysqli_fetch_array($available_rooms)) {
            // echo $rrow['hotel_id']. ": " . $rrow['room_no'] . ", " . $rrow['price_per_night'] . "<br>";
            $rooms_left++;
            // $capacity += $rrow['no_of_people'];
        }

        $hoe = $row['hotelID'];
        $hoe_name = $row['hotelName'];
        $element = "
        <form class=\"div-box\"  /*action=\"pick_room.php\"*/ method=\"POST\" >
        <div><lable>Hotel</lable> <label class = \"var\">: $hoe_name </label> </div><br>
        <div> Service</lable> <label class = \"var\">: </label></div>";
        $element = $element . "<br>";

        $element = $element . "<div>Rooms left </lable> <label class = \"var\">: $rooms_left</label></div><br>
        <div>Capacity left </lable> <label class = \"var\">: $capacity </label></div><br>
        <div>
            <input type=\"submit\" class=\"\" name=\"book_hotel\" value=\"Book Now\"></input>
            <input type=\"hidden\" name =\"chosen_hotel_id\" value=$hoe  >
        </div>
        </form>
        ";

        echo $element;
    }
}

function getAllRooms($hotel_id, $start_date, $end_date) {
    include "../db_connect.php";

    $available_rooms_query = "
        SELECT 
        *
        FROM 
            Rooms 
        WHERE 
            Hotels_hotelID = $hotel_id
            AND roomID NOT IN (	
                SELECT 
                    roomID 
                FROM (
                    SELECT 
                        Rooms_has_Reservations.Reservations_resID as reservation_id,
                        Reservations.checkInDate, 
                        Reservations.checkOutDate, 
                        Rooms_has_Reservations.Rooms_roomID as roomID, 
                        Rooms_has_Reservations.Rooms_Hotels_hotelID
                    FROM 
                        Rooms_has_Reservations 
                    LEFT JOIN 
                        Reservations 
                    ON 
                        Rooms_has_Reservations.Reservations_resID = Reservations.resID
                ) as tmp
                WHERE 
                    Rooms_Hotels_hotelID = $hotel_id
                AND NOT(
                    DATE(checkOutDate) <= '$start_date'
                    OR DATE(checkInDate) >= '$end_date')
        )";
    $available_rooms_res = $conn->query($available_rooms_query);

    return $available_rooms_res;
}