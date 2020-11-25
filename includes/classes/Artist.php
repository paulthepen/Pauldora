<?php
  class Artist {

      private $con;
      private $id;

      //constructor
      public function __construct($con, $id){
        $this->con = $con;
        $this->id = $id;
      }

      //queries artist table and returns the name field
      public function getName(){
        $artistQuery = mysqli_query($this->con, "SELECT name FROM artist WHERE id='$this->id'");
        $artist = mysqli_fetch_array($artistQuery);
        return $artist['name'];
      }

      public function getId(){
        return $this->id;
      }

      public function getSongIds(){
        $query = mysqli_query($this->con, "SELECT id FROM songs WHERE artist='$this->id' ORDER BY plays DESC");
        $array = array();

        while($row = mysqli_fetch_array($query)){
          array_push($array, $row['id']);
        }
        return $array;
      }

    }



?>
