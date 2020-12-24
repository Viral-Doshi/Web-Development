<?php
require('admin_menu.php');
require('db_connect.php');

if(isset($_POST['account'])){
    $fifa_name = $_POST['account'];
    echo "<h1><center>$fifa_name</center></h1>";

    $acc_qry = "SELECT * FROM accounts WHERE fifa_name='$fifa_name'";
    $acc = mysqli_query($conn,$acc_qry) or die('Failed to get account: '.mysqli_error($conn));
    $row = mysqli_fetch_array($acc);

    $fifa_id = $row['fifa_id'];

    echo '<table style="border: None; margin-left: 10%" cellpadding=6';
    echo '<tr>
            <th align="left" style="border: None;"> FIFA ID : </th>
            <td style="border: None;">'.$row['fifa_id'].'</td>
          </tr>
          <tr>
            <th align="left" style="border: None;"> Email-ID : </th>
            <td style="border: None;">'.$row['email_id'].'</td>
          </tr>
          <tr><th style="border: None;"></th></tr>
          <tr><th style="border: None;"></th></tr>
          <tr>
            <th align="left" style="border: None;"> FIFA-Coins : </th>
            <td style="border: None;">'.$row['fifa_coins'].'</td>
          </tr>
          <tr>
            <th align="left" style="border: None;"> Training XP :</th>
            <td style="border: None;">'.$row['training_xp'].'</td>
          </tr>';
    echo '</table>';

    echo '<br><br>';

    $qry_for = "SELECT * FROM owned o, player_cards p WHERE o.card_id = p.card_id AND fifa_id = '$fifa_id'
                AND position IN ('CF','RW','LW')";
    $for = mysqli_query($conn,$qry_for) or die("Failed to find forwards: ".mysqli_error($conn));

    $qry_mid = "SELECT * FROM owned o, player_cards p WHERE o.card_id = p.card_id AND fifa_id = '$fifa_id'
                AND position IN ('CM','RM','LM')";
    $mid = mysqli_query($conn,$qry_mid) or die("Failed to find midfielders: ".mysqli_error($conn));

    $qry_def = "SELECT * FROM owned o, player_cards p WHERE o.card_id = p.card_id AND fifa_id = '$fifa_id'
                AND position IN ('CB','RB','LB','GK')";
    $def = mysqli_query($conn,$qry_def) or die("Failed to find defenders: ".mysqli_error($conn));

    echo '<center>';
    //Forwards
    echo '<h2>Forwards</h2>';
    echo '<form action="admin_card.php" method="post">';
    echo '<table cellpadding=5 >
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
                  <td ><input type = "submit" name = "card" style="color:#fa6900; border: None; background-color: inherit;"
                   value="'.$row['player_name'].'"></td>
                  <td>'.$row['position'].'</td>
                  <td><b> MAX </b></td>
                  <td>'.$row['event_name'].'</td>
                  <td>'.$row['country'].'</td>
                  </tr>';
        }
        else{
            echo '<tr>
                  <td><input type = "submit" name = "card" style="color:#5fe108; border: None; background-color: inherit;"
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
    echo '<h2>Midfielders</h2>';
    echo '<form action="admin_card.php" method="post">';
    echo '<table cellpadding=5 >
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
                  <td><input type = "submit" name = "card" style="color:#fa6900; border: None; background-color: inherit;"
                   value="'.$row['player_name'].'"></td>
                  <td>'.$row['position'].'</td>
                  <td><b> MAX </b></td>
                  <td>'.$row['event_name'].'</td>
                  <td>'.$row['country'].'</td>
                  </tr>';
        }
        else{
            echo '<tr>
                  <td><input type = "submit" name = "card" style="color:#5fe108; border: None; background-color: inherit;"
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
    echo '<h2>Defenders and Goal Keepers</h2>';
    echo '<form action="admin_card.php" method="post">';
    echo '<table cellpadding=5 >
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
                  <td><input type = "submit" name = "card" style="color:#fa6900; border: None; background-color: inherit;"
                   value="'.$row['player_name'].'"></td>
                  <td>'.$row['position'].'</td>
                  <td><b> MAX </b></td>
                  <td>'.$row['event_name'].'</td>
                  <td>'.$row['country'].'</td>
                  </tr>';
        }
        else{
            echo '<tr>
                  <td><input type = "submit" name = "card" style="color:#5fe108; border: None; background-color: inherit;"
                   value="'.$row['player_name'].'"></td>
                  <td>'.$row['position'].'</td>
                  <td>'.$row['lvl'].'</td>
                  <td>'.$row['event_name'].'</td>
                  <td>'.$row['country'].'</td>
                  </tr>';
        }
    }
    echo '</table></form>';
    echo '</center>';

    //Back Button
    echo '<br><form action = "" method = "post" style="margin-left: 10%;">
          <input type="submit" value = "Back" >
          </form>';


}

else{
    echo '<h1><center>All Accounts</center></h1>';

    $qry = "SELECT * FROM accounts";
    $accounts = mysqli_query($conn,$qry) or die('Failed to get accounts: '.mysqli_error($conn));

    echo '<form action="" method="post">';
    echo '<table cellpadding=7 align=center>';
    echo '<tr>
          <th> FIFA Name </th>
          <th> FIFA ID </th>
          <th> Email-ID </th>
          </tr>';

    while($row = mysqli_fetch_array($accounts)){
      $fifa_name = $row['fifa_name'];
      echo "<tr>
            <td><button name='account' type='submit' value = '$fifa_name'
                style='color:#5fe108; border: None; background-color: inherit;'>".$row['fifa_name']."</button></td>
            <td><button name='account' type='submit' value = '$fifa_name'
                style='color:#5fe108; border: None; background-color: inherit;'>".$row['fifa_id']."</button></td>
            <td><button name='account' type='submit' value = '$fifa_name'
                style='color:#5fe108; border: None; background-color: inherit;'>".$row['email_id']."</button></td>
            </tr>";
    }


}

?>
