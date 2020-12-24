<?php
require('admin_menu.php');
require('db_connect.php');

//Insert event
if(isset($_POST['insert'])) {
    echo '<h1><center>Insert Event</center></h1>';

    echo '<br><br>';
    echo '<form action="edit_event.php" method="post" align="center">
          <label>Event Name: <input type="text" name="ename"><br><br>
          <label>Launch Date: <input type="text" name="launch_date"><br><br><br>
          <button type="submit" name="insert_event" value="insert">INSERT</button>
          </form>';
}

//Update event
elseif(isset($_POST['update'])) {
    $today_date = today_date();

    echo '<h1><center>Update Event</center></h1>';
    echo '<h4 style="margin-left: 2%;">Click on the Event to Update</h4>';

    $qry = "SELECT * FROM fifa_events ORDER BY launch_date";
    $up_events = mysqli_query($conn,$qry) or die('Failed to get events: '.mysqli_error($conn));

    echo '<form action="" method="post">';
    echo '<table cellpadding=7 align=center>';
    echo '<tr>
          <th> Event Name </th>
          <th> Launch Date </th>
          </tr>';

    while($row = mysqli_fetch_array($up_events)){
        $ev_name = $row['event_name'];
        echo "<tr>
              <td><input type='submit' name='update' style='color:#5fe108; border: None; background-color: inherit;'
              value='$ev_name'></td>
              <td align=center>".$row['launch_date'].'</td>
              </tr>';
    }
    echo '</table>';
    echo '</form>';

    if ($_POST['update'] != 'Update Event') {
        $event_name = $_POST['update'];
        $qry = "SELECT * FROM fifa_events WHERE event_name='$event_name'";
        $up_events = mysqli_query($conn,$qry) or die('Failed to get events: '.mysqli_error($conn));
        $row = mysqli_fetch_array($up_events);

        echo '<br><br>';
        echo '<form action="edit_event.php" method="post" align="center">
              <label>Event Name: <input type="text" name="new_ename" value="'.$row["event_name"].'"><br><br>
              <label>Launch Date: <input type="text" name="launch_date" value="'.$row["launch_date"].'"><br><br>
              <button type="submit" name="update_event" value="'.$event_name.'">UPDATE</button>
              </form>';
    }
}

//Delete event
elseif(isset($_POST['delete'])) {
    $today_date = today_date();

    echo '<h1><center>Delete Event</center></h1>';
    echo '<h4 style="margin-left: 2%;">Click on the Event to Delete</h4>';

    $qry = "SELECT * FROM fifa_events ORDER BY launch_date";
    $up_events = mysqli_query($conn,$qry) or die('Failed to get events: '.mysqli_error($conn));

    echo '<form action="" method="post">';
    echo '<table cellpadding=7 align=center>';
    echo '<tr>
          <th> Event Name </th>
          <th> Launch Date </th>
          </tr>';

    while($row = mysqli_fetch_array($up_events)){
        $ev_name = $row['event_name'];
        echo "<tr>
              <td><input type='submit' name='delete' style='color:#5fe108; border: None; background-color: inherit;'
              value='$ev_name'></td>
              <td align=center>".$row['launch_date'].'</td>
              </tr>';
    }
    echo '</table>';
    echo '</form>';

    if ($_POST['delete'] != 'Delete Event') {
        $event_name = $_POST['delete'] ;
        echo "<br><center>Are you Sure you want to Delete <b>$event_name</b> ? Deleting this event
              will set to cards of <b>$event_name</b> to NULL</center><br>";
        echo '<form action="edit_event.php" method="post" align="center">
              <button type="submit" name="delete_event" value="'.$event_name.'">DELETE</button>
              </form>';

    }
}

//Add Cards
elseif(isset($_POST['add'])) {

    $event_name = $_POST['add'];

    $qry = 'SELECT * FROM player_cards WHERE event_name IS NULL ORDER BY initial_lvl DESC;';
    $player_cards = mysqli_query($conn,$qry) or die('Failed to get players cards: '.mysqli_error($conn));

    echo '<br><br>';
    echo '<form action="edit_event.php" method="post" >';
    echo '<table border="1" cellpadding=8 align=center >
          <tr>
          <th> Player Name </th>
          <th> Position </th>
          <th> Starting Level </th>
          <th> Country </th>
          <th> Tick </th>
          </tr>';

    while($row = mysqli_fetch_array($player_cards)){
        echo '<tr>
              <td>'.$row['player_name'].'</td>
              <td align="center">'.$row['position'].'</td>
              <td align="center">'.$row['initial_lvl'].'</td>
              <td>'.$row['country'].'</td>
              <td align="center"><input type="checkbox" name="add_cards[]" value="'.$row['player_name'].'"></td>
              </tr>';
    }
    echo '</table><br>';

    echo "<button type='submit' name='add_event_cards' value='$event_name' style='margin-left: 30%;'>Add Cards</button>
          </form>";

}

//Back button
echo '<br><br>';
echo '<form action="admin_events.php" method="post" align="left" style="margin-left: 2%;"">
      <input type="submit" value="Back">
      </form>';

function today_date(){
    $date_array = getdate();

    return $date_array['year']."-".$date_array['mon']."-".$date_array['mday'];
}
?>
