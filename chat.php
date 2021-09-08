<?php 
  ini_set('display_errors',0);
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<head>
<script src="https://cdn.tiny.cloud/1/096xk1xfdf52orj1mhtxnj5ravwmyh80ok6l4k1jzklhpdrv/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: users.php");
          }
        ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="php/images/<?php echo $row['img']; ?>" alt="">
        <div class="details">
          <span><?php echo $row['username'] ?></span>
          <p><?php echo $row['status']; ?></p>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <textarea id="emoticons" placeholder="Type your message here" style="  display: inline-flex; color: whitesmoke; height: 45px; width: calc(100% - 58px); font-size: 16px; padding: 0 13px; border: 1px solid darkgrey; outline: none; border-radius: 5px 0 0 5px; background: darkgrey; color: whitesmoke;">
        
        </textarea>
        
        <button><i class="fab fa-telegram-plane"></i></button>
        
      </form>
    </section>
    
  </div>
  <script>
    tinymce.init({
       selector: 'textarea',  // change this value according to your HTML
       plugins: 'emoticons',
       toolbar: 'emoticons',
       emoticons_database_url: '/emojis.js'
});
  </script>
  
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="javascript/chat.js"></script>
  </body>
</html>
