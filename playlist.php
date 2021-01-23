<?php include("includes/includedFiles.php");

//getting the id if it is set in the url and assigning it to var
if(isset($_GET['id'])) {
  $playlistId = $_GET['id'];
//if id not set, redirect to index.php
} else {
    header("Location: index.php");
}

$playlist = new Playlist($con, $playlistId);
$owner = new User($con, $playlist->getOwner());

?>

<div class="entityInfo">
<div class="leftSection"> <!-- contains artwork -->
<div class="playlistImage">
    <img src="assets/images/icons/playlist.png">
</div>
</div>

<div class="rightSection">  <!-- contains album, artist, and track number -->
  <h2><?php echo $playlist->getName(); ?></h2>
  <p>by <?php echo $playlist->getOwner(); ?></p>
  <p><?php echo $playlist->getNumberOfSongs(); ?> Songs</p>
  <button class="button" onclick="deletePlaylist('<?php echo $playlistId; ?>')">DELETE PLAYLIST</button>
</div>
</div>

<div class="trackListContainer">
  <ul class="trackList">
    <?php
      $songIdArray = $playlist->getSongIds();

      $i = 1;
      foreach($songIdArray as $songId){

        $playlistSong = new Song($con, $songId);
        $songArtist = $playlistSong->getArtist();

        echo "<li class='tracklistRow'>
        <div class='trackCount'>
          <img class='play' src='assets/images/icons/playWhite.png' onclick='setTrack(\"". $playlistSong->getId() ."\", tempPlaylist, true)'>
          <span class='trackNumber'>$i</span>
        </div>

        <div class='trackInfo'>
          <span class='trackName'>".$playlistSong->getTitle()."</span>
          <span class='artistName'>".$songArtist->getName()."</span>
        </div>
        <div class='trackOptions'>
          <input type='hidden' class='songId' value='" . $playlistSong->getId() . "'>
          <img class='optionsButton' src='assets/images/icons/more.png' onclick='showOptionsMenu(this)'>
        </div>
        <div class='trackDuration'>
          <span class='duration'>".$playlistSong->getDuration()."</span>
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
      <div class="item" onclick="removeFromPlaylist(this, '<?php echo $playlistId; ?>')">Remove From Playlist</div>
</nav>
