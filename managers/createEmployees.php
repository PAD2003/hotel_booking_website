<?php
    session_start();
    include "../db_connect.php";

    $hotelID = $_SESSION['Hotels_hotelID'];

?>

<!DOCTYPE html>
<html>
    <head><link rel="stylesheet" href="menu.css"></head>

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
            
            <body>
                <form action = "" method = "post">
                    <fieldset>
                        <legend> Personal Information </legend>

                        Name:      
                        <input type = "text" name = "name">
                        <br>

                        Phone: 
                        <input type = "text" name = "phone">
                        <br>

                        Email: 
                        <input type = "email" name = "email">
                        <br>

                        Address: 
                        <input type = "text" name = "address">
                        <br>

                        Password: 
                        <input type = "password" name = "password">
                        <br>

                        Gender: 
                        <input type = "radio" name = "gender" value = "Male" unchecked>Male
                        <input type = "radio" name = "gender" value = "Female" unchecked>Female
                        <br>

                        Position:
                        <input type = "text" name = "position">
                        <br>

                        <input type = "submit" value = "Create" name = "createEmployee">

                    </fieldset>
                </form>
            </body>
        </div>
</html>

<?php
    if (isset($_POST['createEmployee'], $_POST['name'], $_POST['email'], $_POST['password'], $_POST['position'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $position = $_POST['position'];

        $sql = "SELECT * FROM employees WHERE empEmail = '$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            header ("Location: employees.php");
            exit();
        }

        $sql = "INSERT INTO employees (empName, empPhone, empEmail, empAddress, empGender, position, password, Hotels_hotelID) 
                VALUES ('$name', '$phone', '$email', '$address', '$gender', '$position', '$password', '$hotelID')";
        $result = $conn->query($sql);

        header ("Location: employees.php");
        exit();
    }
