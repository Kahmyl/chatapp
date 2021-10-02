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
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>First Name</label>
            <input type="text" name="fname" placeholder="First name" required>
          </div>
          <div class="field input">
            <label>Last Name</label>
            <input type="text" name="lname" placeholder="Last name" required>
          </div>
        </div>
        <div class="field input">
            <label>Username</label>
            <input type="text" name="username" placeholder="Username" required>
          </div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter new password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label>Select Image</label>
          <input onchange="cloudImage()" type="file"  accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
          <input type="hidden" id=data value="" name="image">
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Continue to Chat">
        </div>
      </form>
      <!-- <img id="data" src="" alt="" width="120"> -->
      <div class="link">Already signed up? <a href="login.php">Login now</a></div>
    </section>
  </div>

  <script src="public/javascript/pass-show-hide.js"></script>
  <script src="public/javascript/signup.js"></script>
  <script>
    const url = "https://api.cloudinary.com/v1_1/hpiddhw8y/image/upload";
    
    function cloudImage() {
      const files = document.querySelector("[type=file]").files;
      const formData = new FormData();
    
      for (let i = 0; i < files.length; i++) {
        let file = files[i];
        formData.append("file", file);
        formData.append("upload_preset", "ml_default");
    
        fetch(url, {
          method: "POST",
          body: formData
        })
          .then((response) => {
            return response.json();
          })
          .then((data) => {
            const imgUrl = data.secure_url;
            document.getElementById("data").value = imgUrl
          });
      }
    }
  </script>

</body>
</html>
