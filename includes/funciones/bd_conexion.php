<?php
	 $conn = new mysqli('localhost', 'root','3201442','gdlwebcamp');
    
     if($conn->connect_error) {
      echo $error = $conn->connect_error;
    }
   
?>