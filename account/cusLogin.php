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
    $sql = "SELECT * FROM Customers WHERE cusEmail = '$login_email' AND password = '$login_password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        // neu tim duoc ket qua trong co so du lieu <-> nguoi dung nhap dung
        $row = mysqli_fetch_assoc($result);
        if ($row['cusEmail'] === $login_email && $row['password'] === $login_password) {
            // luu lai cac thong tin lien qua toi nguoi dung do
            echo "Logged in!";
            $_SESSION['cusID'] = $row['cusID'];
            $_SESSION['cusName'] = $row['cusName'];
            $_SESSION['cusPhone'] = $row['cusPhone'];
            $_SESSION['cusEmail'] = $row['cusEmail'];
            $_SESSION['cusAddress'] = $row['cusAddress'];
            $_SESSION['cusGender'] = $row['cusGender'];
            $_SESSION['password'] = $row['password'];
            header("Location: ../customers/home.php");
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