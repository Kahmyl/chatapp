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
        <img src="<?php echo $row['img']; ?>" alt="">
        <div class="details">
          <span><?php echo $row['username'] ?></span>
          <p><?php echo $row['status']; ?></p>
        </div>
      </header>
      <div id="chat-box" class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <span id="emoji-button">😃</span>
        <input type="text" name="message" class="input-field" id="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
    
  </div>
  <script src="./public/javascript/chat.js"></script>
  <script src="./public/javascript/emoji-button-3.1.1.min.js"></script>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
        var picker = new EmojiButton({
          autoFocusSearch: false,
          // autoHide: false,
          showSearch: false,
          position: "top-start",
          theme: "dark",
          // style:"twemoji",
          // rootElement:"chat-box"
        });
        var button = document.querySelector("#emoji-button");

        button.addEventListener("click", () => {
          picker.togglePicker(button);
        });

        picker.on("emoji", (emoji) => {
          document.querySelector("#input-field").value += emoji;
          document.getElementById("input-field").focus();
        });
      });
  </script>
  </body>
</html>
