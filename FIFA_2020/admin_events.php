<?php
require('admin_menu.php');
require('db_connect.php');

if(isset($_POST['l_event'])){

    echo '<br><br>';
    $event = $_POST['l_event'];
    $qry = "SELECT * FROM player_cards WHERE event_name = '$event' ORDER BY initial_lvl DESC";
    $player_cards = mysqli_query($conn,$qry) or die('Failed to get players cards: '.mysqli_error($conn));

    echo '<form action="admin_card.php" method="post" >';
    echo '<table cellpadding=7 align=center >
          <tr>
          <th> Player Name </th>
          <th> Position </th>
          <th> Starting Level </th>
          <th> Event </th>
          <th> Country </th>
          </tr>';

    // Temporary inline styling done, https://www.w3schools.com/howto/howto_css_text_buttons.asp
    while($row = mysqli_fetch_array($player_cards)){
        echo '<tr>
              <td><input type = "submit" name = "card" style="color:#5fe108; border: None; background-color: inherit;"
               value="'.$row['player_name'].'"></td>
              <td align="center">'.$row['position'].'</td>
              <td align="center">'.$row['initial_lvl'].'</td>
              <td>'.$row['event_name'].'</td>
               <td>'.$row['country'].'</td>
              </tr>';
    }
    echo '</table></form><br>';

    //Back Button
    echo '<form action = "" method = "post" style="margin-left: 2%;">
          <button type="submit" >Events</button>
          </form>';
}

elseif(isset($_POST['u_event'])){

    echo '<br><br>';
    $event = $_POST['u_event'];
    $qry = "SELECT * FROM player_cards WHERE event_name = '$event' ORDER BY initial_lvl DESC";
    $player_cards = mysqli_query($conn,$qry) or die('Failed to get players cards: '.mysqli_error($conn));

    echo '<form action="admin_card.php" method="post" >';
    echo '<table cellpadding=7 align=center >
          <tr>
          <th> Player Name </th>
          <th> Position </th>
          <th> Starting Level </th>
          <th> Event </th>
          <th> Country </th>
          </tr>';

    while($row = mysqli_fetch_array($player_cards)){
        echo '<tr>
              <td><input type = "submit" name = "card" style="color:#5fe108; border: None; background-color: inherit;"
               value="'.$row['player_name'].'"></td>
              <td align="center">'.$row['position'].'</td>
              <td align="center">'.$row['initial_lvl'].'</td>
              <td>'.$row['event_name'].'</td>
               <td>'.$row['country'].'</td>
              </tr>';
    }
    echo '</table></form><br>';

    //Add Cards
    echo '<form action = "change_event.php" method = "post" style="margin-left: 29%;">
          <button type="submit" name="add" value="'.$event.'">Add Cards</button>
          </form><br>';

    //Back Button
    echo '<form action = "" method = "post" style="margin-left: 2%;">
          <button type="submit" >Events</button>
          </form>';
}

else{
    $today_date = today_date();

    // Printing launched events
    echo '<h2><center>LAUNCHED EVENTS </center></h2>';

    $qry = "SELECT * FROM fifa_events WHERE launch_date BETWEEN '2000-01-01' AND '$today_date' ORDER BY launch_date";
    $l_events = mysqli_query($conn,$qry) or die('Failed to get events: '.mysqli_error($conn));

    echo '<form action="" method="post">';
    echo '<table border="1" cellpadding=7 align=center>';
    echo '<tr>
          <th> Event Name </th>
          <th> Launch Date </th>
          </tr>';

    while($row = mysqli_fetch_array($l_events)){
        $ev_name = $row['event_name'];
        echo "<tr>
              <td><input type='submit' name='l_event' style='color:#5fe108; border: None; background-color: inherit;'
              value='$ev_name'></td>
              <td align=center>".$row['launch_date'].'</td>
              </tr>';
    }
    echo '</table>';

    // Printing upcoming events
    echo '<h2><center>UPCOMING EVENTS <center></h2>';

    $qry = "SELECT * FROM fifa_events WHERE launch_date NOT BETWEEN '2000-01-01' AND '$today_date' ORDER BY launch_date";
    $up_events = mysqli_query($conn,$qry) or die('Failed to get events: '.mysqli_error($conn));

    echo '<table border="1" cellpadding=7 align=center>';
    echo '<tr>
          <th> Event Name </th>
          <th> Launch Date </th>
          </tr>';

    while($row = mysqli_fetch_array($up_events)){
        $ev_name = $row['event_name'];
        echo "<tr>
              <td><input type='submit' name='u_event' style='color:#5fe108; border: None; background-color: inherit;'
              value='$ev_name'></td>
              <td align=center>".$row['launch_date'].'</td>
              </tr>';
    }
    echo '</table>';
    echo '</form><br><br>';

    if(isset($_SESSION['changed_event'])){
        echo "<center><h2>".$_SESSION['changed_event']."</h2></center>";
        unset($_SESSION['changed_event']);
        echo '<br><form action="" method="post" align="center">
              <input type="submit" value="Back">
              </form>';
    }
    else {
        echo '<form action= "change_event.php" method="post" align="center">
              <input type="submit" name="insert" value="Insert Event">&nbsp;
              <input type="submit" name="update" value="Update Event">&nbsp;
              <input type="submit" name="delete" value="Delete Event">&nbsp;
              </form>';
    }
}

function today_date(){
    $date_array = getdate();

    return $date_array['year']."-".$date_array['mon']."-".$date_array['mday'];
}
?>
