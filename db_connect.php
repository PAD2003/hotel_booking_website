<!-- ket noi voi database -->
<?php
    $server_name = "localhost"; 
    $server_username = "root";
    $server_password = "";

    $db_name = "hotelManagement4_test";

    $conn = mysqli_connect($server_name, $server_username, $server_password, $db_name);

    if (!$conn) {
        echo "Connection failed";
    }
?>