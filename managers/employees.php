<?php
    session_start();

    $hotelID = $_SESSION['Hotels_hotelID'];
    $empID = $_SESSION['empID'];

    include "../db_connect.php";

    $sql = "SELECT *
            from employees
            where hotels_hotelID = 1
            and empID != '$empID';";

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
                        <a class="header-menu-tab" href="createEmployees.php"><span class="icon fontawesome-user scnd-font-color"></span>New employees</a>
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
                        <th><h1>Employee ID</h1></th>
                        <th><h1>Name</h1></th>
                        <th><h1>Phone</h1></th>
                        <th><h1>Email</h1></th>
                        <th><h1>Address</h1></th>
                        <th><h1>Gender</h1></th>
                        <th><h1>Position</h1></th>
                        <!-- <th><h1>Update</h1></th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                    ?>

                                <tr>
                                    <td><?php echo $row['empID']; ?> </td>
                                    <td><?php echo $row['empName']; ?> </td>
                                    <td><?php echo $row['empPhone']; ?> </td>
                                    <td><?php echo $row['empEmail']; ?> </td>
                                    <td><?php echo $row['empAddress']; ?> </td>
                                    <td><?php echo $row['empGender']; ?> </td>
                                    <td><?php echo $row['position']; ?> </td>
                                    <!-- <td>
                                        <a class = "btn btn-danger" href = "deleteReservations.php?id=<?php echo $row['resID']; ?>">
                                        Delete</a>
                                    </td> -->
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