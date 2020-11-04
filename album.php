<?php include("includes/header.php");

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

echo $album->getTitle() ."<br>";
echo $artist->getName();

?>




<?php include("includes/footer.php"); ?>
