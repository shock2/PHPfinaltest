<?php    
    include_once 'conDB.php';
    session_start();
    if($_SESSION['login']==0){             //判別使用者從哪登入，並確認
       header("Location: Login.php");                 
    }
    
    $table= "";
    $func= empty($_GET['func']) ?"": $_GET['func'];   
    
    switch ($func) {
        case "show_index_page":
        default :
            $result= mysql_query(" SELECT `Record_ID`, `Record_Date`, `Record_Item`, `Record_Prcie`, `Record_Content` FROM `MyRecord` WHERE 1 ORDER BY `Record_Date` DESC");  //執行顯示的SQL   

            $datacount = mysql_num_rows($result) ;                      //有幾筆資料
            $pagecount = ceil ($datacount/10) ;                         //要幾頁
            @$above = $_GET[pagenode]*10+1;                             //回傳遞幾頁，來判斷顯示幾筆到幾筆資料   
            $under = $above+9;                                          //最後一筆資料所在頁數

            $table="<tr><th></th><th align='center' >日期</th><th align='center'>項目</th><th align='center'>價錢</th><th align='center'>備註</th></tr>";        //建立table顯示資料
            while($row= mysql_fetch_array($result)){   
                @$j++;        
                if ($j>=$above && $j<=$under) {
                    $table.= "<tr>";
                    $table.= "<td align='center'>"."<input type='radio' name='id' value='".$row['Record_ID']."' CHECKED>"."</td>";                
                    $table.= "<td align='center'>".$row['Record_Date']."</td>";
                    $table.= "<td align='center'>".$row['Record_Item']."</td>";
                    $table.= "<td align='center'>$ ".$row['Record_Prcie']."</td>";
                    $table.= "<td align='center'>".$row['Record_Content']."</td>";        
                    $table.= "</tr>";      
                }
            }          
        break;
        
        case "show_insert_page":
            header("Location: Mynew.php");
            echo "跳轉至新增畫面";
            exit;                                   
        break;
    
        case "show_update_page":
            $id= $_GET['id'];
            header("Location: http://fs.mis.kuas.edu.tw/~s1100137113/php/PHPfinaltest/Myupdate.php?id=$id");
            echo "跳轉至修改";
            exit; 
        break;
    
        case "action_insert":
            $DATE= empty($_GET['DATE']) ?"": $_GET['DATE']; //接收Mynew.php的參數
            $ITEM= empty($_GET['ITEM']) ?"": $_GET['ITEM'];                    
            $PRICE= empty($_GET['PRICE']) ?"": $_GET['PRICE'];
            $CONTENT= empty($_GET['CONTENT']) ?"": $_GET['CONTENT'];
            
            $ITEM= htmlspecialchars($ITEM,ENT_QUOTES);
            $CONTENT= htmlspecialchars($CONTENT,ENT_QUOTES);
            $CONTENT= nl2br ($CONTENT);
            
            if($PRICE<0){
                header("Location: Mynew.php");
            }                
            
            $str= "INSERT INTO `MyRecord`(`Record_Date`, `Record_Item`, `Record_Prcie`, `Record_Content`) VALUES ('$DATE','$ITEM','$PRICE','$CONTENT')";
            $result=mysql_query($str);                

            if($result>0){
                header("Location: My.php");
            } 
        break;
        
        case "action_update":
            $U_ID= empty($_GET['ID']) ?"": $_GET['ID']; 
            $U_DATE= empty($_GET['DATE']) ?"": $_GET['DATE']; 
            $U_ITEM= empty($_GET['ITEM']) ?"": $_GET['ITEM'];                    
            $U_PRICE= empty($_GET['PRICE']) ?"": $_GET['PRICE'];
            $U_CONTENT= empty($_GET['CONTENT']) ?"": $_GET['CONTENT'];

            $U_SQL=" UPDATE `MyRecord` SET `Record_Date`='$U_DATE', `Record_Item`='$U_ITEM', `Record_Prcie`=$U_PRICE, `Record_Content`='$U_CONTENT' WHERE `Record_ID`='$U_ID' ";
            mysql_query($U_SQL);            
            header("Location: My.php");      
        break;
    
        case "action_delete":
            $D_ID= $_GET['id'];
            $sql = "DELETE FROM MyRecord WHERE Record_ID = ".$D_ID ;
            mysql_query($sql);
            header("Location: My.php");   
        break;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>支出管理</title>
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
                <br/>
                <table border="1" align="center" width="60%">
                    <?php                 
                        echo $table;                         
                    ?>
                </table>   
                <h5><?php       
                for (@$i=0;$i<$pagecount;$i++) {
                    echo "<a href='My.php?pagenode=$i'>".($i+1)."|</a>"."  ";         //分頁選項
                }  
                ?></h5>
                <br/><br/>                
                <button type="submit" name="func" value="show_insert_page" class="btn btn-primary">新增</button>
                <button type="submit" name="func" value="show_update_page" class="btn btn-primary">修改</button>
                <button type="submit" name="func" value="action_delete" class="btn btn-primary">刪除</button>       
            </form>            
        </div>                         
    </body>
</html>
