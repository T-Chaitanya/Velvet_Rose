<?php
            /*document.getElementById("checkin").value = "<?php echo $_GET["checkin"]?>";*/
            $servername = "localhost";
            $username = "root";
            $password = "";

            try {
                $conn = new PDO("mysql:host=$servername;dbname=hotel_db", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            if (isset($_POST["modify"])){
                $checkin = $_POST["checkin"];
                $checkout = $_POST["checkout"];
                $num_adult = $_POST["adults"];
                $num_child = $_POST["children"];
                $num_rooms = $_POST["rooms"];
                $sql1 = "UPDATE reservation SET check_in='".$checkin."', check_out='".$checkout."', num_adult='".$num_adult."', num_child='".$num_child."', num_rooms='".$num_rooms."' WHERE reservation_id='" . $_POST["postId"] . "'";
                $result1 = $conn->query($sql1);

                header('Location: modify.php?confirm_number='.$_POST["postId"].'&modify=True');
            }else if(isset($_POST["cancel"])) {

                $sql1 = "SELECT * FROM reservation WHERE reservation_id='" . $_POST["postId"] . "'";
                $result1 = $conn->query($sql1);
                $row = $result1->fetch(PDO::FETCH_ASSOC);
                if ($row["confirmation_status"]){
                    $sql1 = "UPDATE reservation SET confirmation_status='0' WHERE reservation_id='" . $_POST["postId"] . "'";
                    $result1 = $conn->query($sql1);

                    $sql1 = "SELECT * FROM reservation WHERE reservation_id='" . $_POST["postId"] . "'";
                    $result1 = $conn->query($sql1);

                    $row = $result1->fetch(PDO::FETCH_ASSOC);

                    $sql1 = "UPDATE room SET available_quantity=available_quantity+".$row["num_rooms"]." WHERE room_id='" . $row["room_id"] . "'";
                    $result1 = $conn->query($sql1);
                    echo "Your reservation is cancelled";
                }else{
                    echo "Your reservation is already cancelled";
                }

                header('Location: modify.php?confirm_number='.$_POST["postId"].'&cancel=True');

            }
            ?>
