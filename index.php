<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form signup">
      <header>Cruizers | Kahmyl</header>
      <form onsubmit="submitImage" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>First Name</label>
            <input type="text" name="fname" placeholder="First name" >
          </div>
          <div class="field input">
            <label>Last Name</label>
            <input type="text" name="lname" placeholder="Last name" >
          </div>
        </div>
        <div class="field input">
            <label>Username</label>
            <input type="text" name="username" placeholder="Username" >
          </div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" >
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter new password" >
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label>Select Image</label>
          <input onchange="cloudImage()" type="file"  accept="image/x-png,image/gif,image/jpeg,image/jpg" >
          <!-- <input type="" id=data value="" name="image"> -->
        </div>
        <div class="field button">
          <button type="submit">Continue to Chat</button>
        </div>
      </form>
      <div class="link">Already signed up? <a href="login.php">Login now</a></div>
    </section>
  </div>

  <script src="public/javascript/pass-show-hide.js"></script>
  <!-- <script src="public/javascript/signup.js"></script> -->
  <script src="public/javascript/cloud.js"></script>
  <script>
  </script>
</body>
</html>
