<?php
        // Configuration
        $hostname = 'localhost';
        $database = 'BrainWash';
        $CHAR_SET = "charset=utf8";

        //Variable from the user
        $username = $_POST["username"];
        $password = $_POST["password"];
        $room = $_POST["room_id"];


        $conn = new mysqli($hostname,$username,$password,$database);

				if(!$conn){
					die("Connection Failed. ". mysqli_connect_error());
				}

				$sql = "SELECT * FROM room";
				$result = mysqli_query($conn ,$sql);

        if(mysqli_num_rows($result) > 0)
        {
					//show data for each row
			while($row = mysqli_fetch_assoc($result))
          {

            if($row['room_id'] == $room)
            {
              echo "
              Room:".$row['room_id'].",
              map_size:".$row['map_size'].",
              queue:".$row['queue'].",
              player1_ID:".$row['player1_ID'].",
              player2_ID:".$row['player2_ID'].",
              player1_name:".$row['player1_name'].",
              player2_name:".$row['player2_name'].",
              player1_character:".$row['player1_character'].",
              player2_character:".$row['player2_character'].",
              player1_energy:".$row['player1_energy'].",
              player2_energy:".$row['player2_energy'].",
              player1_people:".$row['player1_people'].",
              player2_people:".$row['player2_people'].",
              state:".$row['state'].",
              ";
              break;
            }
					}
		}

?>
