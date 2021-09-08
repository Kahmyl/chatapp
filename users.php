<?php 
ini_set('display_errors',0);
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">

<style>
    body {
        background-color: #F5F5F5
    }
    
    .mt-200 {
        margin-top: 200px
    }
    
    .dropbtn {
        font-size: 20px !important;
        color: white;
        font-size: 14px;
        border: none;
        border-radius: 3px
    }
    .dropdown {
        position: relative;
        display: inline-block;
        padding-top: 7px;
    }
    
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 200px;
        text-align:center;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1
    }
    
    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block
    }
    
    .dropdown-content a:hover {
        background-color: darkgray;
    }
    
    .dropdown:hover .dropdown-content {
        display: block
    }
    
    .dropdown:hover .dropbtn {
        background-color: grey;
    }
</style>
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
      <div class="dropdown"> <span class="dropbtn"><i class="fa fa-bars"></i></span>
          <div class="dropdown-content">
            <a href="">Profile</a> 
            <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>">Logout</a> </div>
      </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>