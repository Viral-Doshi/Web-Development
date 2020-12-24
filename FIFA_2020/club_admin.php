<?php
require('admin_menu.php');
require('db_connect.php');

if (isset($_POST['clubs'])) {
    $club_name = $_POST['clubs'];

    echo "<h2><center>$club_name</center></h2>";
    $qry = "SELECT player_name FROM played_in p, player_cards c WHERE p.card_id=c.card_id AND club_name = '$club_name'";
    $names = mysqli_query($conn,$qry) or die('Failed to get names: '.mysqli_error($conn));

    echo '<br><br>';
    echo '<table border="1" cellpadding=7 align=center>';
    echo '<tr>
          <th> Player Name </th>
          </tr>';

    while($row = mysqli_fetch_array($names)){
        echo '<tr>
              <td>'.$row['player_name'].'</td>
              </tr>';
    }
    echo '</table>';

    //Back Button
    echo '<br><form action = "" method = "post" style="margin-left: 30%;">
          <button type="submit" >Clubs</button>
          </form>';
}

else {
    echo '<br><h2><center>CLUBS </center></h2>';

    $qry = "SELECT * FROM clubs ORDER BY club_name DESC";
    $clubs = mysqli_query($conn,$qry) or die('Failed to get clubs: '.mysqli_error($conn));

    echo '<form action="" method="post">';
    echo '<table cellpadding=7 align=center>';
    echo '<tr>
          <th> Club Name </th>
          <th> Region </th>
          </tr>';

    while($row = mysqli_fetch_array($clubs)){
        $club_name = $row['club_name'];
        echo "<tr>
              <td><input type='submit' name='clubs' style='color:#5fe108; border: None; background-color: inherit;'
              value='$club_name'></td>
              <td>".$row['region'].'</td>
              </tr>';
    }
    echo '</table></form>';
}

?>
