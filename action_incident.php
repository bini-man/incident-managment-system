<?php
include_once("dbcon.php");
?>
<?php
ob_start();
include_once 'dbcon.php';
?>
 <?php
    $input = filter_input_array(INPUT_POST);
    $title = mysqli_real_escape_string($con, $input["title"]);
    $owner = mysqli_real_escape_string($con, $input["owner"]);
    $description = mysqli_real_escape_string($con, $input["description"]);
    if ($input["action"] === 'edit') {
        $query = "
        UPDATE incident SET 
        title = '" . $title . "',
        owner = '" . $owner . "',
        description= '" . $description . "'
        WHERE serial_number= '" . $input["serial_number"] . "'
     ";
        mysqli_query($con, $query);
    }
    if ($input["action"] === 'delete') {
        $query = "
        DELETE FROM incident 
        WHERE serial_number = '" . $input["serial_number"] . "'
        ";
        mysqli_query($con, $query);
    }
    echo json_encode($input);
    ?>