<?php        
    include_once 'conDB.php';
    session_start();
    if($_SESSION['login']==0){             //判別使用者從哪登入，並確認
       header("Location: Login.php");                 
    }
?>
<html>
    <head>
        <title>新增支出項目</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="./css/table.css" />
        <link rel="stylesheet" type="text/css" href="./css/buttom.css" />
        <link rel="stylesheet" type="text/css" href="./css/style.css" /> 
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
        <form action="My.php" method="GET">
            <br/>
            <table border="1" align="center" width="40%">
                <tr>
                    <td align="center" width="20%"><b>日期</b></td><td align="center"><input type="text" size="30" name="DATE" value="<?php echo @date('Y-m-d', strtotime('+8HOUR'))?>"/></td>
                </tr>  
                <tr>
                    <td align="center" width="20%"><b>項目</b></td><td align="center"><input type="text" size="30" name="ITEM" required/></td>
                </tr>  
                <tr>
                    <td align="center" width="20%"><b>價錢</b></td><td align="center"><input type="text" size="30" name="PRICE" required/></td>
                </tr>  
                <tr>
                    <td align="center" width="20%"><b>備註</b></td><td align="center"><textarea  name="CONTENT" cols="30" rows="5" required>無</textarea></td>
                </tr>
            </table><br/>                                
            <button type="submit" name="func" value="action_insert" class="btn btn-primary">新增</button>             
        </form>  
    </div>   
    </body>
</html>
