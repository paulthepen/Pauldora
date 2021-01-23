<?php include("includes/includedFiles.php");

//getting the id if it is set in the url and assigning it to var
if(isset($_GET['id'])) {
  $albumId = $_GET['id'];
//if id not set, redirect to index.php
} else {
    header("Location: index.php");
}
//create album object using supplied albumId
$album = new Album($con, $albumId);
//creates new Artist object using function in Album object
$artist = $album->getArtist();
?>

<div class="entityInfo">
<div class="leftSection"> <!-- contains artwork -->
  <img src="<?php echo $album->getArtworkPath(); ?>">
</div>

<div class="rightSection">  <!-- contains album, artist, and track number -->
  <h2><?php echo $album->getTitle(); ?></h2>
  <p>by <?php echo $artist->getName(); ?></p>
  <p><?php echo $album->getNumberOfSongs(); ?> Songs</p>
</div>
</div>

<div class="trackListContainer">
  <ul class="trackList">
    <?php
      $songIdArray = $album->getSongIds();

      $i = 1;
      foreach($songIdArray as $songId){

        $albumSong = new Song($con, $songId);
        $albumArtist = $albumSong->getArtist();

        echo "<li class='tracklistRow'>
        <div class='trackCount'>
          <img class='play' src='assets/images/icons/playWhite.png' onclick='setTrack(\"". $albumSong->getId() ."\", tempPlaylist, true)'>
          <span class='trackNumber'>$i</span>
        </div>

        <div class='trackInfo'>
          <span class='trackName'>".$albumSong->getTitle()."</span>
          <span class='artistName'>".$albumArtist->getName()."</span>
        </div>
        <div class='trackOptions'>
          <input type='hidden' class='songId' value='" . $albumSong->getId() . "'>
          <img class='optionsButton' src='assets/images/icons/more.png' onclick='showOptionsMenu(this)'>
        </div>
        <div class='trackDuration'>
          <span class='duration'>".$albumSong->getDuration()."</span>
        </div>
        </li>";
        $i++;

      }
     ?>

    <script>
      var tempSongIds = '<?php echo json_encode($songIdArray); ?>';
      tempPlaylist = JSON.parse(tempSongIds);
    </script>

  </ul>
</div>

<nav class="optionsMenu">
      <input type="hidden" class="songId">
      <?php echo Playlist::getPlaylistsDropdown($con, $userLoggedIn->getUsername()); ?>
</nav>

