<?php 
  ini_set('display_errors',0);
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>

<title>Cruizers | Kahmyl</title>
  <link style="height: 50px; width: 50px;" rel="shortcut icon" type="image/x-icon" href="public/images/cool.png">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<style>
body {
    background-color: #f7f7f7 !important;
}

.padding {
    padding: 3rem !important;
    margin-left: 400px;
    max-width: 800px;
    border-radius: 16px;
    
}
.card {
    -webkit-box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
}
.card-img-top {
    height: 300px
}

.card-no-border .card {
    border-color: #d7dfe3;
    border-radius: 4px;
    margin-bottom: 30px;
    -webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);
    box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05)
}

.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.25rem;
}

.pro-img {
    margin-top: -80px;
    margin-bottom: 20px
}

.little-profile .pro-img img {
    width: 128px;
    height: 128px;
    -webkit-box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    border-radius: 100%
}

html body .m-b-0 {
    margin-bottom: 0px
}

h3 {
    line-height: 30px;
    font-size: 21px
}

.btn-rounded.btn-md {
    padding: 12px 35px;
    font-size: 16px
}

html body .m-t-10 {
    margin-top: 10px
}

.btn-primary,
.btn-primary.disabled {
    background: #7460ee;
    border: 1px solid #7460ee;
    -webkit-box-shadow: 0 2px 2px 0 rgba(116, 96, 238, 0.14), 0 3px 1px -2px rgba(116, 96, 238, 0.2), 0 1px 5px 0 rgba(116, 96, 238, 0.12);
    box-shadow: 0 2px 2px 0 rgba(116, 96, 238, 0.14), 0 3px 1px -2px rgba(116, 96, 238, 0.2), 0 1px 5px 0 rgba(116, 96, 238, 0.12);
    -webkit-transition: 0.2s ease-in;
    -o-transition: 0.2s ease-in;
    transition: 0.2s ease-in
}

.btn-rounded {
    border-radius: 60px;
    padding: 7px 18px
}

.m-t-20 {
    margin-top: 20px
}

.text-center {
    text-align: center !important
}

h1,
h2,
h3,
h4,
h5,
h6 {
    color: #455a64;
    font-family: "Poppins", sans-serif;
    font-weight: 400
}

p {
    margin-top: 0;
    margin-bottom: 1rem
}
</style>
<?php
  $user_id = $_GET["id"];
  $sql = mysqli_query($conn, "SELECT * FROM users WHERE user_id = {$user_id}");
  if(mysqli_num_rows($sql) > 0){
    $row = mysqli_fetch_assoc($sql);
  }
?>
<div class="padding">
    <div class="col-md-8">
        <!-- Column -->
        <div class="card"> <img class="card-img-top" src="" alt="Card image cap">
            <div class="card-body little-profile text-center">
                <div class="pro-img"><img src="<?php echo $row['img'];?>" alt="user" width="128"></div>
                <h2 class="m-b-0"><?php echo $row['username'];?></h2>
                <h3 class="m-b-0"><?php echo $row['fname'];?> <?php echo $row['lname'];?></h3>
                <p><?php echo $row['email'];?></p> <a href="#" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded">Edit Profile</a>
            </div>
        </div>
    </div>
</div>