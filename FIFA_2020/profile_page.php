 <?php
require('user_menu.php');
require('db_connect.php');
?>

<?php

if (isset($_POST['card'])) {
  $fifa_name = $_SESSION['Game_Name'];
    $qry = "SELECT * FROM accounts WHERE fifa_name = '$fifa_name';";
    $account = mysqli_query($conn,$qry) or die("Failed to get $fifa_name datails: ".mysqli_error($conn));
    $row = mysqli_fetch_array($account);

    $fifa_id = $row['fifa_id'];
  echo '<img src="images/profile_bg4.jpg" alt="" height = "100%" width="100%" style = "display:block;">';
    $card_name = $_POST['card'];

    $qry = "SELECT * FROM player_cards c,played_in p
            WHERE c.card_id = p.card_id AND player_name = '$card_name';";
    $card_detail = mysqli_query($conn,$qry) or die("Failed to get $card_name datails: ".mysqli_error($conn));
    $row = mysqli_fetch_array($card_detail);

    $card_id = $row['card_id'];
    //Player Details
    echo '<div class = "pr_card_name">';
    echo '<h1><center>'.$card_name.'</center></h1>';
    echo '</div>';


    echo '<div class = "pr_card_details">';
    echo '<table border = 3 cellpadding= 10 style = "color : white;border: 1px solid #fff; ">
          <tr>
          <th>Country</th>
          <td>'.$row['country'].'</td>
          </tr>
          <tr>
          <th>Club Name</th>
          <td>'.$row['club_name'].'</td>
          </tr>
          <tr>
          <th>Position</th>
          <td>'.$row['position'].'</td>
          </tr>
          <tr>
          <th>Event Name</th>
          <td>'.$row['event_name'].'</td>
          </tr>
          </table>';
    echo '</div>';
    echo '<div class = card_pos>';
    //Current Level
    $qry = "SELECT * FROM card_lvls WHERE card_id = '$card_id'
            AND lvl = (SELECT lvl FROM owned WHERE card_id = '$card_id' AND fifa_id='$fifa_id')";
    $curr = mysqli_query($conn,$qry) or die("Failed to get current card: ".mysqli_error($conn));
    $row = mysqli_fetch_array($curr);

    if($row['lvl'] == 100){
        echo '<h2>Current Level: <b>MAX</b></h2>';
        $flag = 0;
    }
    else{
        echo '<h2>Current Level: '.$row['lvl'].'</h2>';
        $flag = 1;
    }
    echo '<table border = 1 cellpadding = 5>';
    echo '<tr>
          <th> Skill </th>
          <td>'.$row['skill'].'</td>
          </tr>';
    echo '<tr>
          <th> Passing </th>
          <td>'.$row['passing'].'</td>
          </tr>';
    echo '<tr>
          <th> Shooting </th>
          <td>'.$row['shooting'].'</td>
          </tr>';
    echo '</table>';
    //Next Level
    if($flag){
        $qry = "SELECT * FROM card_lvls WHERE card_id = '$card_id'
                AND lvl = 1 + (SELECT lvl FROM owned WHERE card_id = '$card_id' AND fifa_id='$fifa_id')";
        $next = mysqli_query($conn,$qry) or die("Failed to get current card: ".mysqli_error($conn));
        $row = mysqli_fetch_array($next);
        echo '<h2>Next Level: '.$row['lvl'].'</h2>';
        echo '<table border = 1 cellpadding = 5>';
        echo '<tr>
              <th> Skill </th>
              <td>'.$row['skill'].'</td>
              </tr>';
        echo '<tr>
              <th> Passing </th>
              <td>'.$row['passing'].'</td>
              </tr>';
        echo '<tr>
              <th> Shooting </th>
              <td>'.$row['shooting'].'</td>
              </tr>';
        echo '</table>';
        // Table and header are not properly getting printed
        echo '<h4> Training XP Required : '.$row['training_xp'];
    }

    //Explore more Button
    echo '<div class = "pr_loc">';
    echo '
          <form action = "cards_page.php" method = "post">
          <button type="submit" name="card" value="'.$card_name.'">Explore More</button>
          </form>';
          echo '</div>';
    echo '<br>';
    //Back Button
    echo '<br><form action = "" method = "post">
          <input type="submit" value = "Back" >
          </form>';
  echo '</div>';
}
else{

    echo '<img src="images/profile_bg5.jpg" alt="" height = "100%" width="100%" style = "display:block;">
    <img src="images/profile_bg4.jpg" alt="" height = "100%" width="100%" style = "display:block;">
    <div class = "profile">
    <img src="images/profile_pic.jpg" alt="" vspace=20 height = "80%" width="80%" style="border:4px solid Orange;">
    </div>';
    $fifa_name = $_SESSION['Game_Name'];
    $qry = "SELECT * FROM accounts WHERE fifa_name = '$fifa_name';";
    $account = mysqli_query($conn,$qry) or die("Failed to get $fifa_name datails: ".mysqli_error($conn));
    $row = mysqli_fetch_array($account);

    $fifa_id = $row['fifa_id'];
    //Above profile image
    // echo '<div class = "pr_name">';
    // echo 'Welcome '.$fifa_name.'';
    // echo '</div>';
    echo '<div class = "pr_coins">';
    echo 'Fifa Coins : <b>'.$row['fifa_coins'].'</b><br>
          Training XP : <b>'.$row['training_xp'].'</b><br><br>';
    echo '</div>';

    
    echo '<div class = "pr_details">';
    echo '<table border = 3 cellpadding= 10 style = "color : white;border: 1px solid #fff; ">
          <tr>
          <th>Fifa ID</th>
          <td>'.$row['fifa_id'].'</td>
          </tr>
          <tr>
          <th>Fifa Name</th>
          <td>'.$row['fifa_name'].'</td>
          </tr>
          <tr>
          <th>Your Email</th>
          <td>'.$row['email_id'].'</td>
          </tr>
          <tr>
          <th>Password</th>
          <td>######## </td>
          </tr>
          </table>';
    // echo 'Fifa ID : <b>'.$row['fifa_id'].'</b><br><br>
    //       Fifa Name : <b>'.$row['fifa_name'].'</b><br><br>
    //       Your Email : <b>'.$row['email_id'].'</b><br><br>
    //       Password : ######## <br>';
    echo '</div>';
    echo '<div class = "pr_cards">';
    $qry_for = "SELECT * FROM owned o, player_cards p WHERE o.card_id = p.card_id AND fifa_id = '$fifa_id'
                AND position IN ('CF','RW','LW')";
    $for = mysqli_query($conn,$qry_for) or die("Failed to find forwards: ".mysqli_error($conn));

    $qry_mid = "SELECT * FROM owned o, player_cards p WHERE o.card_id = p.card_id AND fifa_id = '$fifa_id'
                AND position IN ('CM','RM','LM')";
    $mid = mysqli_query($conn,$qry_mid) or die("Failed to find midfielders: ".mysqli_error($conn));

    $qry_def = "SELECT * FROM owned o, player_cards p WHERE o.card_id = p.card_id AND fifa_id = '$fifa_id'
                AND position IN ('CB','RB','LB','GK')";
    $def = mysqli_query($conn,$qry_def) or die("Failed to find defenders: ".mysqli_error($conn));

    //Forwards
    echo '<h2><b><u>Forwards</u></b></h2>';
    echo '<form action="" method="post">';
    echo '<table border="1" cellpadding=3 >
          <tr>
          <th> Player Name </th>
          <th> Position </th>
          <th> Card Level </th>
          <th> Event </th>
          <th> Country </th>
          </tr>';

    while ($row = mysqli_fetch_array($for)) {
        //Changed row color for max card
        if($row['lvl'] == 100){
            echo '<tr style="color : #fc4747;">
                  <td ><input type = "submit" name = "card" style="color: #fc4747;
                  font-size: inherit; border: None; background-color: inherit;"
                   value="'.$row['player_name'].'"></td>
                  <td>'.$row['position'].'</td>
                  <td><b> MAX </b></td>
                  <td>'.$row['event_name'].'</td>
                  <td>'.$row['country'].'</td>
                  </tr>';
        }
        else{
            echo '<tr>
                  <td><input type = "submit" name = "card" style="border: None; background-color: inherit;"
                   value="'.$row['player_name'].'"></td>
                  <td>'.$row['position'].'</td>
                  <td>'.$row['lvl'].'</td>
                  <td>'.$row['event_name'].'</td>
                  <td>'.$row['country'].'</td>
                  </tr>';
        }
    }
    echo '</table></form>';

    //Midfielders
    echo '<h2><b><u>Midfielders</b></u></h2>';
    echo '<form action="" method="post">';
    echo '<table border="1" cellpadding=3 >
          <tr>
          <th> Player Name </th>
          <th> Position </th>
          <th> Card Level </th>
          <th> Event </th>
          <th> Country </th>
          </tr>';

    while ($row = mysqli_fetch_array($mid)) {
        if($row['lvl'] == 100){
            //Changed row color for max card
            echo '<tr style="color : #fc4747;">
                  <td><input type = "submit" name = "card" style="  color: #fc4747;
                  font-size: inherit;border: None; background-color: inherit;"
                   value="'.$row['player_name'].'"></td>
                  <td>'.$row['position'].'</td>
                  <td><b> MAX </b></td>
                  <td>'.$row['event_name'].'</td>
                  <td>'.$row['country'].'</td>
                  </tr>';
        }
        else{
            echo '<tr>
                  <td><input type = "submit" name = "card" style="border: None; background-color: inherit;"
                   value="'.$row['player_name'].'"></td>
                  <td>'.$row['position'].'</td>
                  <td>'.$row['lvl'].'</td>
                  <td>'.$row['event_name'].'</td>
                  <td>'.$row['country'].'</td>
                  </tr>';
        }
    }
    echo '</table></form>';

    //Defenders and Goal Keepers
    echo '<h2><b><u>Defenders and Goal Keepers</b></u></h2>';
    echo '<form action="" method="post">';
    echo '<table border="1" cellpadding=3 >
          <tr>
          <th> Player Name </th>
          <th> Position </th>
          <th> Card Level </th>
          <th> Event </th>
          <th> Country </th>
          </tr>';

    while ($row = mysqli_fetch_array($def)) {
        if($row['lvl'] == 100){
            //Changed row color for max card
            echo '<tr style="color : #fc4747;"> 
                  <td><input type = "submit" name = "card" style="color: #fc4747;
  font-size: inherit;border: None; background-color: inherit;"
                   value="'.$row['player_name'].'"></td>
                  <td>'.$row['position'].'</td>
                  <td><b> MAX </b></td>
                  <td>'.$row['event_name'].'</td>
                  <td>'.$row['country'].'</td>
                  </tr>';
        }
        else{
            echo '<tr>
                  <td><input type = "submit" name = "card" style="border: None; background-color: inherit;"
                   value="'.$row['player_name'].'"></td>
                  <td>'.$row['position'].'</td>
                  <td>'.$row['lvl'].'</td>
                  <td>'.$row['event_name'].'</td>
                  <td>'.$row['country'].'</td>
                  </tr>';
        }
    }
    echo '</table></form>';
    echo'</div>';

}

?>
