<?php
require('admin_menu.php');
require('db_connect.php');

if (isset($_POST['update_card_lvl'])) {
    $card_id = $_POST['update_card_lvl'];
    $lvl = $_POST['lvl'];
    $skill = $_POST['skill'];
    $passing = $_POST['passing'];
    $shooting = $_POST['shooting'];
    $training_xp = $_POST['training_xp'];

    $qry = "UPDATE card_lvls SET lvl =$lvl, skill =$skill, passing=$passing, shooting=$shooting, training_xp=$training_xp  WHERE
            card_id='card_id';";
    mysqli_query($conn,$qry) or die("Unable to update : ".mysqli_error($conn));
    $_SESSION['changed_card'] = "Updated Successfully";
    header("location: admin_card.php");
}
