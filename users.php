<?php 
ini_set('display_errors',0);
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          
        </div>
       
      </header>
      <div class="search">
      <div class= "george"><a href="logout.php"><i class="fas fa-bars"></i></a></div>
        <span class="tailw">Cruizers</span>
        <input type="text" placeholder=" search...">
        <button><i class="fas fa-search ze"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>
</html>
