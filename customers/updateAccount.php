<?php
    session_start();

    include "../db_connect.php";

    if (isset($_SESSION['cusID'])) {
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
                    <p><?php echo $_SESSION['cusName']; ?> <a href=""><span class="entypo-down-open scnd-font-color"></span></a></p>
                </div>
            </header>
            
            <body>
                <form action = "" method = "post">
                    <fieldset>
                        <legend> Personal Information </legend>

                        Name:      
                        <input type = "text" name = "name" value = "<?php echo $_SESSION['cusName']; ?>">
                        <br>

                        Phone: 
                        <input type = "text" name = "phone" value = "<?php echo $_SESSION['cusPhone']; ?>">
                        <br>

                        Email: 
                        <input type = "email" name = "email" value = "<?php echo $_SESSION['cusEmail']; ?>">
                        <br>

                        Address: 
                        <input type = "text" name = "address" value = "<?php echo $_SESSION['cusAddress']; ?>">
                        <br>

                        Password: 
                        <input type = "password" name = "password" value = "<?php echo $_SESSION['password']; ?>">
                        <br>

                        Gender: 
                        <input type = "radio" name = "gender" value = "Male" <?php if ($_SESSION['cusGender'] == "Male") {echo "checked";} ?> >Male
                        <input type = "radio" name = "gender" value = "Female" <?php if ($_SESSION['cusGender'] == "Female") {echo "checked";} ?> >Female
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
        $cusID = $_SESSION['cusID'];
        $newName = $_POST['name'];
        $newPhone = $_POST['phone'];
        $newEmail = $_POST['email'];
        $newAddress = $_POST['address'];
        $newPassword = $_POST['password'];
        $newGender = $_POST['gender'];

        $sql = "UPDATE customers SET
                cusName = '$newName',
                cusPhone = '$newPhone',
                cusEmail = '$newEmail',
                cusAddress = '$newAddress',
                cusGender = '$newGender',
                password = '$newPassword'
                WHERE cusID = '$cusID'";

        $result = $conn->query($sql);

        if ($result == TRUE) {
            $_SESSION['cusName'] = $newName;
            $_SESSION['cusPhone'] = $newPhone;
            $_SESSION['cusEmail'] = $newEmail;
            $_SESSION['cusAddress'] = $newAddress;
            $_SESSION['cusGender'] = $newGender;
            $_SESSION['password'] = $newPassword;

            header('Location: home.php');
        } else {
            echo "Error:" . $sql . "<br>" . $conn->error;
        }
    }
?>