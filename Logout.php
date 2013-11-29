<?php
    session_start();
    session_destroy();    
?>
<html>
    <head>
        <title>登出</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>                
      <div align="center">
        <br/><br/><br/><br/>
        您已登出，系統將在3秒後跳轉到登入畫面，感謝您的光臨，歡迎下次再來!!
      </div>
            <?php  header("refresh:3; URL=Login.php"); ?>       
    </body>
</html>

