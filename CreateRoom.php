<?php
        // Configuration

        $hostname = 'localhost';
        $database = 'BrainWash';
        $CHAR_SET = "charset=utf8";

        //Variable from the user
        $username = $_POST["username"];
        $password = $_POST["password"];
        $room_id = $_POST["room_id"];
        $sizeMap = $_POST["mapSize"];

        $conn = new mysqli($hostname,$username,$password,$database);

        if(!$conn)
        {
					die("Connection Failed. ". mysqli_connect_error());
				}
        else
        {

        $createTable = "CREATE TABLE `".$room_id."` (
                index_x INT(2) NULL,
                index_y INT(2) NULL,
                block VARCHAR(10) NULL,
                block_number INT(2) NOT NULL PRIMARY KEY
                )";

        mysqli_query($conn ,$createTable);
        $num = 0;
        for ($i=0; $i < $sizeMap ; $i++)
        {
          for ($j=0; $j < $sizeMap; $j++)
          {
            mysqli_query($conn ,"INSERT INTO `".$room_id."` (index_x,index_y,block,block_number) VALUES ('".$j."','".$i."',NULL,'".$num."')");
            $num++;
          }
        }

        echo "Connection Succeded, Create table.";
      }

?>
