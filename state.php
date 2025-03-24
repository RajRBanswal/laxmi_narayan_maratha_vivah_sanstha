<?php
require("./db_connection.php");

if (isset($_POST["country_value"])) {
    $country_value = $_POST["country_value"];
    if ($country_value == 'country') {
        $country_id = $_POST["country_id"];
        if ($country_id == 105) {
            $result = mysqli_query($conn, "SELECT * FROM states where country_id = $country_id");
?>
            <option value="">Select State</option>
            <?php
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <option value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?> </option>
        <?php
            }
        }
    }
}

if (isset($_POST["state_value"])) {
    $state_value = $_POST["state_value"];
    if ($state_value == 'state') {
        $state_id = $_POST["state_id"];
        $result2 = mysqli_query($conn, "SELECT * FROM cities where state_id = $state_id");
        ?>
        <option value=""> Select City</option>
        <?php
        while ($row = mysqli_fetch_array($result2)) {
        ?>
            <option value="<?php echo $row["id"]; ?>"><?php echo  strtoupper($row["name"]); ?></option>
        <?php
        }
    }
}







if (isset($_POST["country_filter"])) {
    $country_value = $_POST["country_filter"];
    if ($country_value == 'country_filter') {
        $country_id = $_POST["country_id"];
        $result = mysqli_query($conn, "SELECT * FROM states where country_id = $country_id");
        ?>
        <option value="">Select State</option>
        <?php
        while ($row = mysqli_fetch_array($result)) {
        ?>
            <option value="<?php echo $row['id']; ?>" data-state_id="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?> </option>
        <?php
        }
    }
}

if (isset($_POST["state_filter"])) {
    $state_filter = $_POST["state_filter"];
    if ($state_filter == 'state_filter') {
        $state_id = $_POST["state_id"];
        $result2 = mysqli_query($conn, "SELECT * FROM cities where state_id = $state_id");
        ?>
        <option value=""> Select City</option>
        <?php
        while ($row = mysqli_fetch_array($result2)) {
        ?>
            <option value="<?php echo $row["id"]; ?>"><?php echo  strtoupper($row["name"]); ?></option>
<?php
        }
    }
}
?>
?>