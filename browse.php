<?php 
include("includes/includedFiles.php");
 ?>


  <h1 class="pageHeadingBig">Music</h1>

  <div class="gridViewContainer">

    <?php
    /*This section of code uses the append operator (.) to concatenate this string into
    an HTML section that iterates through the array of albums, and displays the artwork image and title for 10 randomly selected albums*/
      $albumQuery = mysqli_query($con, "SELECT * FROM albums ORDER BY title");

      while($row = mysqli_fetch_array($albumQuery)) {

        echo "<div class='gridViewItem'>
        <span role='link' tabindex='0' onclick='openPage(\"album.php?id=" .$row['id']. "\")'>
          <img src='".$row['artworkPath']."'>

          <div class='gridViewInfo'>"
            .$row['title'].
          "</div>
          </span>

        </div>";
      }
     ?>

  </div>

