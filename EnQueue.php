<?php
        // Configuration
        $hostname = 'localhost';
        $database = 'BrainWash';
        $CHAR_SET = "charset=utf8";

        //Variable from the user
        $username = $_POST["username"];
        $password = $_POST["password"];
        $room_id = $_POST["room_id"];
		    $player_name = $_POST["playername"];

		$conn = new mysqli($hostname,$username,$password,$database);

			if(!$conn)
			{
				die("Connection Failed. ". mysqli_connect_error());
			}
			else
      {
			     $result = mysqli_query($conn ,"UPDATE `room` SET `queue` = '".$player_name."' WHERE `room`.`room_id` = '".$room_id."' LIMIT 1 ");

           if(mysqli_num_rows($result) == 1)
           {
             echo "Enqueue: '".$player_name."' ";
           }
      }



?>
