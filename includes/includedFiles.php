<?php

//http_x_requested_with is included in ajax calls, so this finds ajax requested pages
if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    include("includes/config.php");
    include("includes/classes/User.php");
    include("includes/classes/Artist.php");
    include("includes/classes/Album.php");  //Artist.php must come first because Album references it
    include("includes/classes/Song.php");
    include("includes/classes/Playlist.php");

    if(isset($_GET['userLoggedIn'])){
        $userLoggedIn = new User($con, $_GET['userLoggedIn']);
    }
    else {
        echo "username not passed into page. Check openPage().";
        exit;
    }
}
else {
    include("includes/header.php");
    include("includes/footer.php");

    $url = $_SERVER['REQUEST_URI'];
    echo "<script>openPage('$url')</script>";
    exit();
}

?>
