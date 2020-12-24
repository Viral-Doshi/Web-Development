<html>
<head>
  <style>
  #customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:nth-child(odd){background-color: white;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #ff7105;
  color: white;
}
/*Single Card Table*/
#customers_s {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 40%;
}

#customers_s td, #customers_s th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers_s tr:nth-child(even){background-color: #f2f2f2;}
#customers_s tr:nth-child(odd){background-color: white;}

#customers_s tr:hover {background-color: #ddd;}

#customers_s th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #ff7105;
  color: white;
}
.button {

  background-color: #ff7105;
  border: none;
  color: white;
  padding: 7px 5px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  top: 191px;
  left: 420px
}

body{
  background-image:url(images/cards_bg982.jpeg);
  background-attachment: fixed;
  background-size: 100% 100%;
}

</style>
<link rel="stylesheet" href="css/home_styles.css" type="text/css" />
</head>

<?php
require('user_menu.php');
require('db_connect.php');
?>
<?php
//Showing Player Card when Clicked
if(isset($_POST['card'])){
    echo'<head>
    <style>
    body{
  background-image:url(images/events_bg2.jpg);
  background-attachment: fixed;
  background-size: 100% 100%;
}
    </style>
    </head>';
    $card_name = $_POST['card'];


    $qry = "SELECT * FROM player_cards c,played_in p
            WHERE c.card_id = p.card_id AND player_name = '$card_name';";
    $card_detail = mysqli_query($conn,$qry) or die("Failed to get $card_name datails: ".mysqli_error($conn));
    $row = mysqli_fetch_array($card_detail);

    echo '<h1 style="color:white;"><b><u><center>'.$card_name.'</u></b></center></h1>';
    echo '<div class = "events_card_details">';
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
    $qry = "SELECT player_name, lvl, skill, passing, shooting, training_xp
            FROM player_cards p,card_lvls c WHERE c.card_id = p.card_id
            AND player_name = '$card_name';";
    $card = mysqli_query($conn,$qry) or die("Failed to get $card_name player cards: ".mysqli_error($conn));

    //Player Table
    echo '<table id = "customers_s" align = "center">
          <tr>
          <th> Player Name </th>
          <th> Level </th>
          <th> Skill </th>
          <th> Passing </th>
          <th> Shooting </th>
          <th> Training XP </th>
          </tr>';
    echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
    while($row = mysqli_fetch_array($card)){
        echo '<tr>
              <td>'.$row['player_name'].'</td>
              <td>'.$row['lvl'].'</td>
              <td>'.$row['skill'].'</td>
              <td>'.$row['passing'].'</td>
              <td>'.$row['shooting'].'</td>
              <td>'.$row['training_xp'].'</td>
              </tr>';
    }
      echo '</table>';
    //Back Button 
    echo '<form action = "" method = "post">
          <br>
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          &nbsp&nbsp&nbsp
          <button class="button" type="submit" >All Cards</button>
          </form>';
}

//All Cards

else{
    echo '<div class = "car_form">';
    echo '<form action="" method="post">
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
          &nbsp&nbsp&nbsp&nbsp
        <select name = "event" style="width: 100px;">
            <option> EVENTS
            <option> Prime Icons
            <option> La Liga
            <option> Premier League
            <option> Ligue 1
            <option> Calcio A
        </select>
        <div class="sub-but">
        <input type="submit" name="submit" value="Submit">
        </div>
    </form>
    <br><br>';
echo '</div>';
    $select = "";
    selection();
    $qry = 'SELECT * FROM player_cards '.$select.' ORDER BY initial_lvl DESC;';
    $player_cards = mysqli_query($conn,$qry) or die('Failed to get players cards: '.mysqli_error($conn));
    echo '<div class = "car_table">';
    echo '<form action="" method="post">';
    echo '<table id = "customers"  align = "center">
          <tr>
          <th> Player Name </th>
          <th> Position </th>
          <th> Starting Level </th>
          <th> Event </th>
          <th> Country </th>
          </tr>';

    while($row = mysqli_fetch_array($player_cards)){
        echo '<tr>
              <td><input type = "submit" name = "card" style="border: None; background-color: inherit;"
               value="'.$row['player_name'].'"></td>
              <td><input type = "submit" name = "position" style="border: None; background-color: inherit;"
               value="'.$row['position'].'"></td>
              <td align= "center">'.$row['initial_lvl'].'</td>
              <td><input type = "submit" name = "event" style="border: None; background-color: inherit;"
               value="'.$row['event_name'].'"></td>
               <td><input type = "submit" name = "country" style="border: None; background-color: inherit;"
                value="'.$row['country'].'"></td>
              </tr>';
    }
    echo '</table></form>';
    echo '</div>';
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