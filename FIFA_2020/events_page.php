<?php
require('user_menu.php');
require('db_connect.php');


$today_date = today_date();
  echo '<img src="images/events_bg4.jpg" alt="" height = "100%" width="100%" style = "display:block;">';
// Printing launched events
echo '<div class = "event_details">';
echo '<div class = "events_highlight">';
// echo '<div class = "event_details">';
echo '<h2><center>LAUNCHED EVENTS <center></h2>';
$qry = "SELECT * FROM fifa_events WHERE launch_date BETWEEN '2020-01-01' AND '$today_date' ORDER BY launch_date";
$l_events = mysqli_query($conn,$qry) or die('Failed to get events: '.mysqli_error($conn));

echo '<form action="cards_page.php" method="post">';
echo '<table border="1" cellpadding=3 align=center>';
echo '<tr>
      <th> Event Name </th>
      <th> Launch Date </th>
      </tr>';

while($row = mysqli_fetch_array($l_events)){
    $ev_name = $row['event_name'];
    echo "<tr>
          <td><input type='submit' name='event' style = 'border: None; background-color: inherit;color: black;
          font-size: inherit;'
          value='$ev_name'></td>
          <td>".$row['launch_date'].'</td>
          </tr>';
}
echo '</table>';

// Printing upcoming events
echo '<h2><center>UPCOMING EVENTS <center></h2>';

$qry = "SELECT * FROM fifa_events WHERE launch_date NOT BETWEEN '2020-01-01' AND '$today_date' ORDER BY launch_date";
$up_events = mysqli_query($conn,$qry) or die('Failed to get events: '.mysqli_error($conn));

echo '<table border="1" cellpadding=3 align=center>';
echo '<tr>
      <th> Event Name </th>
      <th> Launch Date </th>
      </tr>';

while($row = mysqli_fetch_array($up_events)){
    $ev_name = $row['event_name'];
    echo "<tr>
          <td><input type='submit' name='event' style = 'border: None; background-color: inherit;color: black;
  font-size: inherit;'
          value='$ev_name'></td>
          <td>".$row['launch_date'].'</td>
          </tr>';
}
echo '</table>';
echo '</form>';
echo '</div>';


function today_date(){
    $date_array = getdate();

    return $date_array['year']."-".$date_array['mon']."-".$date_array['mday'];
}
?>
</div>