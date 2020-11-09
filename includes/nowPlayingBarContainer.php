<?php
  //get 10 random song id's
  $songQuery = mysqli_query($con, "SELECT id FROM songs ORDER BY RAND() LIMIT 10");

  $resultArray = array();
  //push song id's into php array
  while($row = mysqli_fetch_array($songQuery)){
    array_push($resultArray, $row['id']);
  }
//convert to json array
$jsonArray = json_encode($resultArray);
 ?>

 <script>
$(document).ready(function(){
  currentPlaylist = <?php echo $jsonArray; ?>;
  audioElement = new Audio();
  setTrack(currentPlaylist[0], currentPlaylist, false);
  updateVolumeProgressBar(audioElement.audio);

//control progressbar slider
  $(".playbackBar .progressBar").mousedown(function(){
    mouseDown = true;
  });
  $(".playbackBar .progressBar").mousemove(function(e){
    if(mouseDown) {
      //Set time of song, depending on position of mouseDown
      timeFromOffset(e, this);
    }
  });
  $(".playbackBar .progressBar").mouseup(function(e){
      timeFromOffset(e, this);
  });

  $(document).mouseup(function(){
    mouseDown = false;
  });

  //control volumebar slider
    $(".volumeBar .progressBar").mousedown(function(){
      mouseDown = true;
    });
    $(".volumeBar .progressBar").mousemove(function(e){
      if(mouseDown) {
        var percentage = e.offsetX / $(this).width();
        if(percentage>=0 && percentage<=1){
          audioElement.audio.volume = percentage;
        }
      }
    });
    $(".volumeBar .progressBar").mouseup(function(e){
      var percentage = e.offsetX / $(this).width();
      if(percentage>=0 && percentage<=1){
        audioElement.audio.volume = percentage;
      }
    });

    $(document).mouseup(function(){
      mouseDown = false;
    });

});

function timeFromOffset(mouse, progressBar){
  var percentage = mouse.offsetX / $(progressBar).width() * 100;
  var seconds = audioElement.audio.duration * (percentage / 100);
  audioElement.setTime(seconds);
};

function setTrack(trackId, newPlaylist, play){

  $.post("includes/handlers/ajax/getSongJson.php", {songId: trackId}, function(data){

    var track = JSON.parse(data);
    $(".trackName span").text(track.title);

    $.post("includes/handlers/ajax/getArtistJson.php", {artistId: track.artist}, function(data){
      var artist = JSON.parse(data);
      $(".artistName span").text(artist.name);
    });

    $.post("includes/handlers/ajax/getAlbumJson.php", {albumId: track.album}, function(data){
      var album = JSON.parse(data);
      $(".albumLink img").attr("src", album.artworkPath);
    });

    audioElement.setTrack(track);
    playSong();
  });

  if(play){
    audioElement.play();
  }
}
function playSong(){

  if(audioElement.audio.currentTime == 0){
    $.post("includes/handlers/ajax/updatePlays.php", {songId: audioElement.currentlyPlaying.id});
  }

  audioElement.play();
  $(".controlButton.pause").show();
  $(".controlButton.play").hide();

}

function pauseSong(){
  audioElement.pause();
  $(".controlButton.pause").hide();
  $(".controlButton.play").show();
}
 </script>


<div id="nowPlayingBarContainer">
  <div id="nowPlayingBar">

      <div id="nowPlayingLeft">
        <div class="content">
          <span class="albumLink">
            <img src="" class="albumArtwork"></img>
          </span>

          <div class="trackInfo">
            <span class="trackName">
              <span></span>
            </span>

            <span class="artistName">
              <span></span>
            </span>

          </div>
        </div>
      </div>

      <div id="nowPlayingCenter">
        <div class="content playerControls">
          <div class="buttons">
            <button class="controlButton shuffle" title="Shuffle button">
              <img src="assets/images/icons/shufflebutton.png" alt="Shuffle">
            </button>
            <button class="controlButton previous" title="Previous button">
              <img src="assets/images/icons/previousbutton.png" alt="Previous">
            </button>
            <button class="controlButton play" title="Play button" onclick="playSong()">
              <img src="assets/images/icons/playbutton.png" alt="Play">
            </button>
            <button class="controlButton pause" title="Pause button" style="display:none;" onclick="pauseSong()">
              <img src="assets/images/icons/pausebutton.png" alt="Pause">
            </button>
            <button class="controlButton next" title="Next button">
              <img src="assets/images/icons/nextbutton.png" alt="Next">
            </button>
            <button class="controlButton repeat" title="Repeat button">
              <img src="assets/images/icons/repeatbutton.png" alt="Repeat">
            </button>
          </div>
            <div class="playbackBar">
              <span class="progressTime current">0.00</span>
              <div class="progressBar">
                <div class="progressBarBg">
                  <div class="progress"></div>
                </div>
              </div>
              <span class="progressTime remaining">0.00</span>

            </div>
        </div>
      </div>

      <div id="nowPlayingRight">
        <div class="volumeBar">
          <button class="controlButton volume" title="Volume Button" alt="Volume">
            <img src="assets/images/icons/volumebutton.png">
          </button>
          <div class="progressBar">
            <div class="progressBarBg">
              <div class="progress"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
