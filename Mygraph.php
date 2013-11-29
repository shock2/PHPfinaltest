<?php
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>支出月份圖表</title>
        <link rel="stylesheet" type="text/css" href="./css/table.css" />        
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <link rel="stylesheet" type="text/css" href="./css/buttom.css" />
    </head>
    <body>     
        <img src="./image/Cloudy.jpg" id="full-screen-background-image" />
        <div align="center">             
            <header align="center">
                <?php include 'siteheader.php';?>
            </header>
            <section align="center">                        
                <?php include 'site.php';?>
            </section>
        </div>
        <div align="center" height="400px">
            <br/>
            <form action="Mygraphfile.php" method="POST">
                輸入年份<input type="text" name="year"/>
                <input type="submit" value="送出" class="btn btn-primary"/>
            </form>
        </div>    
    </body>
</html>
