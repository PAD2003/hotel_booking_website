<!-- xu ly dang ky tai khoan -->
<?php
    session_start();
    include "../db_connect.php"; // ket noi voi database

    if (!isset($_POST['register_name'], $_POST['register_email'], $_POST['register_password'])) {
        exit('Empty Field(s) in register');
    }

    // nguoi dung submit khong day du
    if (empty($_POST['register_name'] || empty($_POST['register_email']) || empty($_POST['register_password']))) {
        exit('Values Empty');
    }

    // xu ly thong tin nguoi dung submit
    // stmt: coi nhu 1 statement - 1 cau truy van
    if ($stmt = $conn->prepare("SELECT cusEmail, password FROM customers WHERE cusEmail = ?")) {
        $stmt->bind_param('s', $_POST['register_email']); // dien vao vi tri '?'
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            // neu nguoi dung da tung dang ky
            header ("Location: ../index.php?error=This email already exists. You can log in!");
            exit();
        } else {
            // neu nguoi dung chua tung dang ky
            // them du lieu vao database
            if ($stmt = $conn->prepare("INSERT INTO customers (cusName, cusEmail, password) VALUES (?, ?, ?)")) {
                $stmt->bind_param('sss', $_POST['register_name'], $_POST['register_email'], $_POST['register_password']);
                $stmt->execute();
                header ("Location: ../index.php?error=Now, you can log in.");
                exit();
            } else {
                header ("Location: ../index.php?error=Error Occurred. Try again!");
                exit();
            }
        }
        $stmt->close();
    } else {
        header ("Location: ../index.php?error=Error Occurred. Try again!");
        exit();
    }
?>