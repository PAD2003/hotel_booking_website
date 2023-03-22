<?php
    session_start();

    $hotelID = $_SESSION['Hotels_hotelID'];

    include "../db_connect.php";

    $sql = "SELECT *
            from reservations inner join employees
            on employees_empID = empID
            where hotels_hotelID = '$hotelID';";

    $result = $conn->query($sql);

    if ($result == false) {
        echo "fail query";
        exit();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="menu.css">
        <link rel="stylesheet" href="table.css">
    </head>

    <body>
        <div class="main-container">
            <header class="block">
                <ul class="header-menu horizontal-list">
                    <li>
                        <a class="header-menu-tab" href="home.php"><span class="icon fontawesome-user scnd-font-color"></span>Home</a>
                    </li>
                    <li>
                        <a class="header-menu-tab" href="employees.php"><span class="icon fontawesome-user scnd-font-color"></span>Employees</a>
                    </li>
                    <li>
                        <a class="header-menu-tab" href="reservations.php"><span class="icon fontawesome-star-empty scnd-font-color"></span>Reservations</a>
                    </li>
                    <li>
                        <a class="header-menu-tab" href="../account/logout.php"><span class="icon fontawesome-envelope scnd-font-color"></span>Log out</a>
                    </li>
                </ul>
                <div class="profile-menu">
                    <p><?php echo $_SESSION['empName']; ?> <a href=""><span class="entypo-down-open scnd-font-color"></span></a></p>
                </div>
            </header>

            <table class="container">
                <thead>
                    <tr>
                        <th><h1>Reservation ID</h1></th>
                        <th><h1>Check In</h1></th>
                        <th><h1>Check Out</h1></th>
                        <th><h1>Employee ID</h1></th>
                        <th><h1>Customer ID</h1></th>
                        <th><h1>Total</h1></th>
                        <th><h1>Update</h1></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                    ?>

                                <tr>
                                    <td><?php echo $row['resID']; ?> </td>
                                    <td><?php echo $row['checkInDate']; ?> </td>
                                    <td><?php echo $row['checkOutDate']; ?> </td>
                                    <td><?php echo $row['Employees_empID']; ?> </td>
                                    <td><?php echo $row['Customers_cusID']; ?> </td>
                                    <td><?php 
                                        $resID = $row['resID'];
                                        $sql1 = "SELECT sum(price) * (checkOutDate - checkInDate) as total
                                                from rooms_has_reservations rhs inner join rooms r inner join reservations rs
                                                on  rhs.rooms_roomID = r.roomID 
                                                and rhs.Rooms_hotels_hotelID = r.hotels_hotelID 
                                                and rhs.reservations_resID = rs.resID
                                                where rhs.reservations_resID = '$resID';";
                                        $result1 = $conn->query($sql1);
                                        $row1 = $result1->fetch_assoc();
                                        echo $row1['total'];
                                    ?> </td>
                                    <td>
                                        <a class = "btn btn-danger" href = "deleteReservations.php?id=<?php echo $row['resID']; ?>">
                                        Delete</a>
                                    </td>
                                </tr>
                    <?php 
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>