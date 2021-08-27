<?php 
session_start();
include_once "php/config.php";
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
<a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a>