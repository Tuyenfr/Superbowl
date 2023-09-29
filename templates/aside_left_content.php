<p class="aside_left_title1"><a class="link_title" href="about_superbowl_user.php">A propos du Super Bowl</a></p>

      <ul>
         <li><a class="link_list_about_sb" href="about_superbowl_user.php">Histoire du Super Bowl</a></li>
         <li><a class="link_list_about_sb" href="about_superbowl_user.php">Actualités du Super Bowl</a></li>
         <li><a class="link_list_about_sb" href="about_superbowl_user.php">Résultats des années antérieures</a></li>
      </ul>

<p class="aside_left_title2">Infos équipes</p>

      <?php

      try{
         
         require "../constants/pdo.php";
   
         foreach ($pdo->query('SELECT * FROM teams ORDER BY team_name ASC', PDO::FETCH_ASSOC) as $team)
         {
            ?>
            <form action="team_info.php" method="POST">
            <ul>
               <li class="teams_list">
                  <input class="button_team" type="submit" name="team_name" value="<?php echo $team['team_name']; ?>">
               </li>
            </ul>
            </form>
         <?php }
      } catch (PDOException $e) {
         echo 'Accès aux données impossible';}
         ?>
