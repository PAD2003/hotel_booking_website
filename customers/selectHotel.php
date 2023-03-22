<?php
  include "../db_connect.php";

  $sql = "SELECT * FROM Hotels";

  $result = $conn->query($sql);

  if ($result == false) {
      echo "fail query";
      exit();
  }
?>

<form action="#">
      <label for="hotel">Hotel</label>
      <select name="hotels" id="hotel">

        <?php
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
        ?>
            <option value="javascript"><?php echo $row['hotelName'] ?></option>
        <?php
              }
            }
        ?>
      </select>
      <input type="submit" value="Submit" />
</form>

