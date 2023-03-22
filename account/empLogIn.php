<!-- xu ly dang nhap -->
<?php
    session_start();
    include "../db_connect.php"; // ket noi voi database

    // neu nguoi dung bam submit
    if (isset($_POST['login_email']) && isset($_POST['login_password'])) {
        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }
    $login_email = validate($_POST['login_email']);
    $login_password = validate($_POST['login_password']);

    // neu nguoi dung submit thieu
    if (empty($login_email)) {
        header ("Location: ../index.php?error=Email is required");
        exit();
    } else if (empty($login_password)) {
        header ("Location: ../index.php?error=Password is required");
        exit();
    }

    // neu nguoi dung submit day du
    // thuc hien truy van database
    $sql = "SELECT * FROM Employees WHERE empEmail = '$login_email' AND password = '$login_password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        // neu tim duoc ket qua trong co so du lieu <-> nguoi dung nhap dung
        $row = mysqli_fetch_assoc($result);
        if ($row['empEmail'] === $login_email && $row['password'] === $login_password) {
            // luu lai cac thong tin lien qua toi nguoi dung do
            echo "Logged in!";
            $_SESSION['empID'] = $row['empID'];
            $_SESSION['empName'] = $row['empName'];
            $_SESSION['empPhone'] = $row['empPhone'];
            $_SESSION['empEmail'] = $row['empEmail'];
            $_SESSION['empAddress'] = $row['empAddress'];
            $_SESSION['empGender'] = $row['empGender'];
            $_SESSION['position'] = $row['position'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['Hotels_hotelID'] = $row['Hotels_hotelID'];
            if ($row['position'] == "manager") {
                header("Location: ../managers/home.php");
                exit();
            }
            header("Location: ../employees/home.php");
            exit();
        } else {
            // nguoi dung nhap sai
            header("Location: ../index.php?error=Incorrect Email or Password");
            exit();
        }
    } else {
        // khong tim duoc ket qua trong database <-> nguoi dung nhap sai
        header("Location: ../index.php?error=Incorrect Email or Password");
        exit();
    }