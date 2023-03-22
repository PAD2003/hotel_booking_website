<?php
    session_start();

    include "../db_connect.php";

    if (isset($_SESSION['empID'])) {
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="menu.css">
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
                        <input type = "text" name = "name" value = "<?php echo $_SESSION['empName']; ?>">
                        <br>

                        Phone: 
                        <input type = "text" name = "phone" value = "<?php echo $_SESSION['empPhone']; ?>">
                        <br>

                        Email: 
                        <input type = "email" name = "email" value = "<?php echo $_SESSION['empEmail']; ?>">
                        <br>

                        Address: 
                        <input type = "text" name = "address" value = "<?php echo $_SESSION['empAddress']; ?>">
                        <br>

                        Password: 
                        <input type = "password" name = "password" value = "<?php echo $_SESSION['password']; ?>">
                        <br>

                        Gender: 
                        <input type = "radio" name = "gender" value = "Male" <?php if ($_SESSION['empGender'] == "Male") {echo "checked";} ?> >Male
                        <input type = "radio" name = "gender" value = "Female" <?php if ($_SESSION['empGender'] == "Female") {echo "checked";} ?> >Female
                        <br>

                        <input type = "submit" value = "update" name = "update">

                    </fieldset>
                </form>
            </body>
        </html>
<?php
    } else {
        header('Location: home.php');
    }

    if (isset($_POST['update'])) {
        $empID = $_SESSION['empID'];
        $newName = $_POST['name'];
        $newPhone = $_POST['phone'];
        $newEmail = $_POST['email'];
        $newAddress = $_POST['address'];
        $newPassword = $_POST['password'];
        $newGender = $_POST['gender'];

        $sql = "UPDATE Employees SET
                empName = '$newName',
                empPhone = '$newPhone',
                empEmail = '$newEmail',
                empAddress = '$newAddress',
                empGender = '$newGender',
                password = '$newPassword'
                WHERE empID = '$empID'";

        $result = $conn->query($sql);

        if ($result == TRUE) {
            $_SESSION['empName'] = $newName;
            $_SESSION['empPhone'] = $newPhone;
            $_SESSION['empEmail'] = $newEmail;
            $_SESSION['empAddress'] = $newAddress;
            $_SESSION['empGender'] = $newGender;
            $_SESSION['password'] = $newPassword;

            header('Location: home.php');
        } else {
            echo "Error:" . $sql . "<br>" . $conn->error;
        }
    }
?>