<?php
    include("includes/includedFiles.php");
?>
<div class="addMusic">
    <div class="container borderBottom">
        <h1>Add Music</h1>
    </div>   
    <div class="containerTop borderBottom">
        <div class="containerLeft">
            <div class="addItem"><span class="label">Album Name</span><input type="text" name="albumNameInput" id="albumNameInput" placeholder="Dark Side of The Moon" onfocus="this.setSelectionRange(this.value.length,this.value.length);"></div>
            <div class="addItem"><span class="label">Album Image Link</span><input type="text" name="albumImgInput" id="albumImgInput" placeholder="www.website.com/myimg.png"></div>
            <div class="addItem"><span class="label">Artist Name</span><input type="text" name="artistNameInput" id="artistNameInput" placeholder="Pink Floyd"></div>
            <div class="addItem"><span class="label">Genre</span><input type="text" name="genreInput" id="genreInput" placeholder="Rock"></div>
            <div class="selectAlbum"><a href="#">Album already added? Click here</a></div>
        </div>
        <div class="containerRight"> 
            <div class="albumImgPreview"></div>
            <div class="albumNamePreview"></div>          
            <div class="artistNamePreview"></div>
        </div>
    </div>
    <div class="containerBottom">
        <h2>Songs</h2>
        <span class="label">Number of Songs: <input type="text" name="numSongsInput" id="numSongsInput" /></span>
    </div>
</div>

<script>
    $("#albumNameInput").focus();
    $(function() {

        $("#albumNameInput").keyup(function(){
            clearTimeout(timer);

            timer = setTimeout(function() {
                var val = $("#albumNameInput").val();
                $(".albumNamePreview").empty();
                $(".albumNamePreview").append('<span class="previewSpan albumNameSpan">' + val + '</span>');
            }, 500);
        });
    });

    $("#albumImgInput").focus();
    $(function() {

        $("#albumImgInput").focusout(function(){
            clearTimeout(timer);

            timer = setTimeout(function() {
                var val = $("#albumImgInput").val();
                $(".albumImgPreview").empty();
                $(".albumImgPreview").append('<span class="albumImgSpan"><img class="albumArtwork" src="' + val + '" /></span>');
            }, 1000);
        });
    });

    $("#artistNameInput").focus();
    $(function() {

        $("#artistNameInput").keyup(function(){
            clearTimeout(timer);

            timer = setTimeout(function() {
                var val = $("#artistNameInput").val();
                $(".artistNamePreview").empty();
                $(".artistNamePreview").append('<span class="previewSpan artistNameSpan">' + val + '</span>');
            }, 500);
        });
    });
</script>