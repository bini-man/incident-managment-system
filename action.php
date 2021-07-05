<?php
include_once("dbcon.php");
?>
<?php
ob_start();
include_once 'dbcon.php';
?>
 <?php
    $input = filter_input_array(INPUT_POST);
    $first_name = mysqli_real_escape_string($con, $input["first_name"]);
    $last_name = mysqli_real_escape_string($con, $input["last_name"]);
    if ($input["action"] === 'edit') {
        $query = "
        UPDATE users SET first_name = '" . $first_name . "',
        last_name= '" . $last_name . "'
        WHERE id= '" . $input["id"] . "'
     ";
        mysqli_query($con, $query);
    }
    if ($input["action"] === 'delete') {
        $query = "
        DELETE FROM users 
        WHERE id = '" . $input["id"] . "'
        ";
        mysqli_query($con, $query);
    }
    echo json_encode($input);
    ?>