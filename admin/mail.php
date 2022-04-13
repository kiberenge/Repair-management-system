<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Mail Form Localhost In Php</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <style media="screen">
  * {
  padding: 0;
  margin: 0;
  font-family: sans-serif;
  box-sizing: border-box;
}

body {
  display: grid;
  place-items: center;
  height: 100vh;
  background: #eb184d;
}

#container {
  height: auto;
  width: 450px;
  background: #fff;
  padding: 20px 20px 70px 20px;
}

#container h2 {
  text-align: center;
  font-size: 50px;
  font-weight: 500;
  padding: 30px 0;
  color: #2c2727;
}

#alert {
  height: auto;
  padding: 20px;
  display: grid;
  place-items: center;
  font-size: 20px;
  background: #eb184d60;
}

input,
textarea {
  height: 55px;
  width: 100%;
  border: none;
  outline: none;
  background: #00000010;
  color: #2e2727;
  margin: 5px 0;
  padding: 0 20px;
  font-size: 20px;
}

textarea {
  height: 200px;
  padding: 20px;
  resize: none;
}

input::placeholder,
textarea::placeholder {
  color: #2c2727;
}

input[type="submit"] {
  background: #eb184d;
  color: #fff;
  cursor: pointer;
}
  </style>
    <div id="container">
        <h2>Send Message</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="OFF">
            <?php
            if(isset($_POST['send'])){
                $receiver = $_POST['receiver'];
                $subject = $_POST['subject'];
                $message = $_POST['message'];
                $sender = "FROM: marigarepairs05@gmail.com";
                if(empty($receiver) || empty($subject) || empty($message)){
                    ?>
                    <div id="alert">All Inputs are required</div>
                    <?php
                }else{
                    if(mail($receiver,$subject,$message,$sender)){
                        ?>
                        <div id="alert">Message Sent Successfully To <br> <?php echo $receiver ?></div>
                        <?php
                    }else{
                        ?>
                        <div id="alert">Failed While Sending Your Mail<br>Please Check Your Connection.</div>
                        <?php
                    }
                }
            }
            ?>
            <!-- <div id="alert">All Inputs are required</div> -->
            <input type="email" name="receiver" placeholder="Email"><br>
            <input type="text" name="subject" placeholder="Subject"><br>
            <textarea name="message" placeholder="Enter Your Message Here."></textarea><br>
            <input type="submit" name="send" value="Send">
        </form>
    </div>
</body>

</html>
