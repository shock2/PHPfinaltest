<?php
    include_once 'conDB.php';    
    session_start();
    if($_SESSION['login']==0){             //判別使用者從哪登入，並確認
       header("Location: Login.php");                 
    }
    
    $id= empty($_GET['id']) ?"": $_GET['id'];    
    $SQL="SELECT `Record_Date`, `Record_Item`, `Record_Prcie`, `Record_Content` FROM MyRecord WHERE Record_ID=".$id;
    $result= mysql_query($SQL); 
    $row= mysql_fetch_array($result);
        
     ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>支出修改</title>
        
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
            <form action='My.php' method='GET'>
                <br/><br/>                    
                <table border="1" align="center" width="40%">
                    <tr hidden>
                       <td><b>編號</b><td><input type="text" name="ID" value="<?php echo $id?>" hidden/></td>
                    </tr>
                    <tr>
                       <td><b>日期</b></td><td><input type="text" name="DATE" value="<?php echo $row['Record_Date']?>"/></td>
                    </tr>  
                    <tr>
                       <td><b>項目</b></td><td><input type="text" name="ITEM" value="<?php echo $row['Record_Item']?>"/></td>
                    </tr>  
                    <tr>
                       <td><b>價錢</b></td><td><input type="text" name="PRICE" value="<?php echo $row['Record_Prcie']?>" disabled="false"/></td>
                    </tr>  
                    <tr>
                       <td><b>備註</b></td><td><textarea  name="CONTENT"><?php echo $row['Record_Content']?></textarea></td>
                    </tr>
                </table><br/>
                <button type="submit" name="func" value="action_update" class="btn btn-primary">修改</button>              
            </form>
        </div>         
    </body>
</html>
