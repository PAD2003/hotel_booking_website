<?php
    session_start();
    @ include 'function.php';

    if (isset($_SESSION['cusID'])) {
        include "../db_connect.php";

        $sql = "SELECT * FROM Hotels";

        $result = $conn->query($sql);

        if ($result == false) {
            echo "fail query";
            exit();
        }
        $city_query = "SELECT * FROM City";
        $cities = $conn->query($city_query);
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
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
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
            
            <body>
                <form action = "" method = "post" >
                    <fieldset>
                        <legend>New Reservations</legend>

                        <label for="cities">Choose a Location:</label>
                        <select name="city" id="cities">
                            <?php
                                if ($cities->num_rows > 0) {
                                    while ($city = $cities->fetch_assoc()) {
                            ?>
                                        <option value="<?php echo $city['city_id']?>"><?php echo $city['city_name'] ?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                        <br>

                        Check In:
                        <input type="date" name="start_date" id="start_date" >
                        <br>

                        Check Out:
                        <input type="date" name="end_date" id="end_date" >
                        <br> <br>

                        <input type = "submit" value = "View Hotels" name = "conditions">

                    </fieldset>
                </form>

                <?php
                     if (isset($_POST['conditions']))
                     {
                        $selected_city = mysqli_escape_string($conn,$_POST['city']);
                        $hotels_query = "SELECT * FROM Hotels WHERE city_id = " . $selected_city;
                        echo $hotels_query;
                        $hotels = $conn->query($hotels_query);
                        $_SESSION['start_date'] = $_POST['start_date'];
                        $_SESSION['end_date'] = $_POST['end_date'];
                        if ($_POST['start_date'] >= $_POST['end_date']) {
                            $error[] = 'date from must before date to';
                        } else {
                            createHotelsSelection($hotels, $_SESSION['start_date'], $_SESSION['end_date']); 
                        }
                        if(isset($error)){
                            foreach($error as $error){
                                echo '<span class="error-msg">'.$error.'</span>';
                            }
                        }
                    }

                    if(isset($_POST['book_hotel'])){
                        $_SESSION['chosen_hotel_id'] =  $_POST['chosen_hotel_id'];
                        header('location:pick_room.php');
                    }
                ?>
            </body>
            
            
        </div>
    </body>
</html> 