<?php
require('admin_menu.php');
require('db_connect.php');

if (isset($_POST['update'])) {
    $card_id = $_POST['update'];

    $qry = "SELECT p.card_id,player_name, lvl, skill, passing, shooting, training_xp
            FROM player_cards p,card_lvls c WHERE c.card_id = p.card_id
            AND p.card_id = '$card_id';";
    $card = mysqli_query($conn,$qry) or die("Failed to get player cards: ".mysqli_error($conn));

    $row1 = mysqli_fetch_array($card);
    $player_name = $row1['player_name'];


    echo "<h1><center>Update $player_name</center></h1>";
    echo '<table cellpadding=7 align=center>
          <tr>
          <th> Player Name </th>
          <th> Level </th>
          <th> Skill </th>
          <th> Passing </th>
          <th> Shooting </th>
          <th> Training XP </th>
          </tr>';

    $card = mysqli_query($conn,$qry) or die("Failed to get player cards: ".mysqli_error($conn));
    while ($row = mysqli_fetch_array($card)) {
        $card_id = $row['card_id'];
        echo '<tr>
              <td>'.$row['player_name'].'</td>
              <td align=center>'.$row['lvl'].'</td>
              <td align=center>'.$row['skill'].'</td>
              <td align=center>'.$row['passing'].'</td>
              <td align=center>'.$row['shooting'].'</td>
              <td align=center>'.$row['training_xp'].'</td>
              </tr>';
    }
    echo '</table>';

    if (!isset($_POST['card_lvl'])) {
        echo '<h4 style="margin-left: 2%;">Enter the level to Update card</h4><br>';
        echo '<form action="" method="post" align="center">
              <label>Card level: <input type="text" name="card_lvl" size = 3><br><br>
              <button type="submit" name="update" value="'.$card_id.'">Update Card</button>
              </form>';
    }
    else{
        $card_lvl = $_POST['card_lvl'];
        $qry = "SELECT * FROM card_lvls c WHERE  c.card_id = '$card_id' AND c.lvl = $card_lvl";
        $card_row = mysqli_query($conn,$qry) or die("Failed to get player card: ".mysqli_error($conn));
        $row = mysqli_fetch_array($card_row);

        echo '<br><br>';
        echo '<form action="edit_card.php" method="post" style="margin-left:30%;">
              <table style="border: None; margin-left: 10%" cellpadding = 7>
              <tr>
              <th style="border: None;" align=left>Card level: </th>
              <td style="border: None;"><input type="text" name="lvl" value="'.$row["lvl"].'" size = 4></td></tr>
              <tr>
              <th style="border: None;"align=left><label>Skill: </th>
              <td style="border: None;"><input type="text" name="skill" value="'.$row["skill"].'" size = 4></td></tr>
              <tr>
              <th style="border: None;"align=left><label>Passing: </th>
              <td style="border: None;"><input type="text" name="passing" value="'.$row["passing"].'" size = 4></td></tr>
              <tr>
              <th style="border: None;"align=left><label>Shooting: </th>
              <td style="border: None;"><input type="text" name="shooting" value="'.$row["shooting"].'" size = 4></td></tr>
              <tr>
              <th style="border: None;"align=left><label>Training XP: </th>
              <td style="border: None;"><input type="text" name="training_xp" value="'.$row["training_xp"].'" size = 4></td></tr>
              </table><br>
              <button type="submit" name="update_card_lvl" style=" margin-left: 10%" value="'.$card_id.'">UPDATE</button>
              </form>';
    }
}

?>
