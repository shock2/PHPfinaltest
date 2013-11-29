<?php        
    include_once 'conDB.php';
    session_start();
    if($_SESSION['login']==0){             //判別使用者從哪登入，並確認
       header("Location: Login.php");                 
    }
    
    $first_date= empty($_POST['first_date']) ?"": $_POST['first_date'];
    $final_date= empty($_POST['final_date']) ?"": $_POST['final_date'];
    
    $str= " SELECT SUM(`Record_Prcie`)
            FROM MyRecord
            WHERE `Record_Date` between ('$first_date') AND ('$final_date')";
    $result= mysql_query($str);
    
    $msg= "";
    while($row= mysql_fetch_array($result)){
        $msg.= $row['SUM(`Record_Prcie`)'];
    }
?>
<html>
    <head>
        <title>支出統計</title>
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
        <form action="Mysearch.php" method="POST">
            <br/>
            <table border="1" align="center" width="40%">
                <tr>
                    <th>起始日期</th><th>結束日期</th>
                </tr>
                <tr>
                    <td align="center"><input type="date" name="first_date" /></td><td align="center"><input type="date" name="final_date" /></td>
                </tr>
                <tr>
                    <th align="center" colspan="2">結果</th>
                </tr>
                <tr>
                    <td align="center" colspan="2">
                        <?php 
                            echo "$ ".$msg;
                        ?>
                    </td>
                </tr>
            </table><br/>                                
            <button type="submit" name="func" value="action_insert" class="btn btn-primary">查詢</button>             
        </form>  
    </div>   
    </body>
</html>
