<?php
require('admin_menu.php');
require('db_connect.php');
?>

<?php
//Showing Player Card when Clicked
if(isset($_POST['card'])){
    $card_name = $_POST['card'];

    $qry = "SELECT * FROM player_cards c,played_in p
            WHERE c.card_id = p.card_id AND player_name = '$card_name';";
    $card_detail = mysqli_query($conn,$qry) or die("Failed to get $card_name datails: ".mysqli_error($conn));
    $row = mysqli_fetch_array($card_detail);

    //Player Details
    echo '<h1><center>'.$card_name.'</center></h1>';
    echo 'Country : <b>'.$row['country'].'</b><br>
          Club : <b>'.$row['club_name'].'</b><br>
          Position : <b>'.$row['position'].'</b><br>
          Event : <b>'.$row['event_name'].'</b><br>';


    $qry = "SELECT p.card_id,player_name, lvl, skill, passing, shooting, training_xp
            FROM player_cards p,card_lvls c WHERE c.card_id = p.card_id
            AND player_name = '$card_name';";
    $card = mysqli_query($conn,$qry) or die("Failed to get $card_name player cards: ".mysqli_error($conn));

    //Player Table
    echo '<table cellpadding=7 align=center >
          <tr>
          <th> Player Name </th>
          <th> Level </th>
          <th> Skill </th>
          <th> Passing </th>
          <th> Shooting </th>
          <th> Training XP </th>
          </tr>';

    while($row = mysqli_fetch_array($card)){
        echo '<tr>
              <td>'.$row['player_name'].'</td>
              <td align=center>'.$row['lvl'].'</td>
              <td align=center>'.$row['skill'].'</td>
              <td align=center>'.$row['passing'].'</td>
              <td align=center>'.$row['shooting'].'</td>
              <td align=center>'.$row['training_xp'].'</td>
              </tr>';
        $card_id = $row['card_id'];
    }
    echo '</table>';

    //Update button
    echo '<br><form action= "change_card.php" method="post">
          <button type="submit" name="update" value="'.$card_id.'" style="margin-left:33%;">Update Card</button>
          </form>';

    //Back Button
    echo '<br><form action = "" method = "post">
          <button type="submit" style="margin-left:2%;">To All Cards</button>
          </form>';
}

//All Cards
else{
    echo '<center><form action="" method="post">
        <select name= "position" style="width: 110px;">
            <option> POSITIONS
            <optgroup label = "Forwards">
                <option> CF
                <option> LW
                <option> RW
            </optgroup>
            <optgroup label = "Midfielders">
                <option> CM
                <option> RM
                <option> LM
            </optgroup>
            <optgroup label = "Defenders">
                <option> CB
                <option> LB
                <option> RB
            </optgroup>
            <optgroup label = "Goal Keeper">
                <option> GK
             </optgroup>
        </select>

        <select name = "event">
            <option> EVENTS
            <option> Prime Icons
            <option> La Liga
            <option> Premier League
            <option> Ligue 1
            <option> Calcio A
        </select>

        <input type="submit" name="submit" value="Submit">
    </form></center>
    <br><br>';

    $select = "";
    selection();
    $qry = 'SELECT * FROM player_cards '.$select.' ORDER BY initial_lvl DESC;';
    $player_cards = mysqli_query($conn,$qry) or die('Failed to get players cards: '.mysqli_error($conn));

    echo '<form action="" method="post" >';
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
              <td><input type = "submit" name = "position" style="color:#5fe108; border: None; background-color: inherit;"
               value="'.$row['position'].'"></td>
              <td align=center>'.$row['initial_lvl'].'</td>
              <td><input type = "submit" name = "event" style="color:#5fe108; border: None; background-color: inherit;"
               value="'.$row['event_name'].'"></td>
               <td><input type = "submit" name = "country" style="color:#5fe108; border: None; background-color: inherit;"
                value="'.$row['country'].'"></td>
              </tr>';
    }
    echo '</table></form>';

    if (isset($valid_flag) && $valid_flag) {
        echo '<form action = "" method = "post">
              <input type="submit" value = "Bck" >
              </form>';
    }
}

function selection(){
    $valid_flag = 0;
    if(isset($_POST['position']) && $_POST['position'] != 'POSITIONS'){
        if ($valid_flag == 1) {
            $pos = $_POST['position'];
            $GLOBALS['select'] = $GLOBALS['select'].' AND '." position = '$pos'";
        }
        else{
            $valid_flag = 1;
            $pos = $_POST['position'];
            $GLOBALS['select'] = " position = '$pos'";
        }

    }
    if(isset($_POST['event']) && $_POST['event'] != 'EVENTS'){
        if ($valid_flag == 1) {
            $event = $_POST['event'];
            $GLOBALS['select'] = $GLOBALS['select'].' AND '." event_name = '$event'";
        }
        else {
            $valid_flag = 1;
            $event = $_POST['event'];
            $GLOBALS['select'] = " event_name = '$event'";
        }
    }

    if(isset($_POST['country'])){
        $valid_flag = 1;
        $country = $_POST['country'];
        $GLOBALS['select'] = " country = '$country'";
    }

    if ($valid_flag){
        $GLOBALS['select'] = "WHERE".$GLOBALS['select'];
    }
}

?>
</div>
