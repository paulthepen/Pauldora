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
        </div>
        <div class="containerRight"> 
            <div class="albumImgPreview"></div>
            <div class="albumNamePreview"></div>          
            <div class="artistNamePreview"></div>
        </div>
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
                $(".albumNamePreview").append('<span class="albumNameSpan">' + val + '</span>');
            }, 500);
        });
    });
</script>