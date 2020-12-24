<?php
require('admin_menu.php');
require('db_connect.php');

//Insert Event
if(isset($_POST['insert_event'])){
    $event_name = $_POST['ename'];
    $launch_date = $_POST['launch_date'];

    $qry = "INSERT INTO fifa_events VALUES ('$event_name', '$launch_date');";
    mysqli_query($conn,$qry) or die("Unable to create $event_name: ".mysqli_error($conn));
    $_SESSION['changed_event'] = "Inserted Successfully";
    header("location: admin_events.php");
}

//Update Event
elseif(isset($_POST['update_event'])){
    $n_ename = $_POST['new_ename'];
    $launch_date = $_POST['launch_date'];
    $o_ename = $_POST['update_event'];

    $qry = "UPDATE fifa_events SET event_name = '$n_ename', launch_date = '$launch_date' WHERE
            event_name = '$o_ename';";
    mysqli_query($conn,$qry) or die("Unable to update $o_ename: ".mysqli_error($conn));
    $_SESSION['changed_event'] = "Updated Successfully";
    header("location: admin_events.php");
}

//Delete Event
elseif(isset($_POST['delete_event'])){
    $event_name = $_POST['delete_event'];

    $qry = "DELETE FROM fifa_events WHERE event_name = '$event_name';";
    echo $qry;
    mysqli_query($conn,$qry) or die("Unable to delete $event_name: ".mysqli_error($conn));
    $_SESSION['changed_event'] = "Deleted Successfully";
    header("location: admin_events.php");
}

//Add Cards
elseif(isset($_POST['add_event_cards'])){
    $cards = $_POST['add_cards'];
    $event_name = $_POST['add_event_cards'];

    $count = count ($cards);
    for($i = 0; $i< $count; $i++)
    {
        $qry = 'UPDATE player_cards SET event_name = "'.$event_name.'" WHERE player_name = "'. $cards[$i].'"';
        mysqli_query($conn,$qry) or die("Unable to add cards: ".mysqli_error($conn));
    }
    $_SESSION['changed_event'] = "Cards Added Successfully";
    header("location: admin_events.php");
}
