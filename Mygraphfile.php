<?php  
    include 'conDB.php';       
    include("./phpgraphlib-master/phpgraphlib.php");
    
    $year= $_POST['year'];
    
    $result=mysql_query("SELECT SUM(`Record_Prcie`) 
            FROM `MyRecord`
            WHERE `Record_Date` BETWEEN (".$year."0101) AND (".$year."0131)");   
    $row1= mysql_fetch_array($result);
    $result= mysql_query("SELECT SUM(`Record_Prcie`) 
            FROM `MyRecord`
            WHERE `Record_Date` BETWEEN (".$year."0201) AND (".$year."0229)");
    $row2= mysql_fetch_array($result);
    $result= mysql_query("SELECT SUM(`Record_Prcie`) 
            FROM `MyRecord`
            WHERE `Record_Date` BETWEEN (".$year."0301) AND (".$year."0331)");
    $row3= mysql_fetch_array($result);
    $result= mysql_query("SELECT SUM(`Record_Prcie`) 
            FROM `MyRecord`
            WHERE `Record_Date` BETWEEN (".$year."0401) AND (".$year."0430)");
    $row4= mysql_fetch_array($result);
    $result= mysql_query("SELECT SUM(`Record_Prcie`) 
            FROM `MyRecord`
            WHERE `Record_Date` BETWEEN (".$year."0501) AND (".$year."0531)");
    $row5= mysql_fetch_array($result);
    $result= mysql_query("SELECT SUM(`Record_Prcie`) 
            FROM `MyRecord`
            WHERE `Record_Date` BETWEEN (".$year."0601) AND (".$year."0630)");
    $row6= mysql_fetch_array($result);
    $result= mysql_query("SELECT SUM(`Record_Prcie`) 
            FROM `MyRecord`
            WHERE `Record_Date` BETWEEN (".$year."0701) AND (".$year."0731)");
    $row7= mysql_fetch_array($result);
    $result= mysql_query("SELECT SUM(`Record_Prcie`) 
            FROM `MyRecord`
            WHERE `Record_Date` BETWEEN (".$year."0801) AND (".$year."0831)");
    $row8= mysql_fetch_array($result);
    $result= mysql_query("SELECT SUM(`Record_Prcie`) 
            FROM `MyRecord`
            WHERE `Record_Date` BETWEEN (".$year."0901) AND (".$year."0930)");
    $row9= mysql_fetch_array($result);
    $result= mysql_query("SELECT SUM(`Record_Prcie`) 
            FROM `MyRecord`
            WHERE `Record_Date` BETWEEN (".$year."1001) AND (".$year."1031)");
    $row10= mysql_fetch_array($result);
    $result= mysql_query("SELECT SUM(`Record_Prcie`) 
            FROM `MyRecord`
            WHERE `Record_Date` BETWEEN (".$year."1101) AND (".$year."1130)");
    $row11= mysql_fetch_array($result);
    $result= mysql_query("SELECT SUM(`Record_Prcie`) 
            FROM `MyRecord`
            WHERE `Record_Date` BETWEEN (".$year."1201) AND (".$year."1231)");
    $row12= mysql_fetch_array($result);

    $graph = new PHPGraphLib(400,300);
    $data = array("Jan"=>$row1['SUM(`Record_Prcie`)'], "Feb"=>$row2['SUM(`Record_Prcie`)'], "Mar"=>$row3['SUM(`Record_Prcie`)'], "Apr"=>$row4['SUM(`Record_Prcie`)'], "May"=>$row5['SUM(`Record_Prcie`)'], "Jun"=>$row6['SUM(`Record_Prcie`)'],
                "Jul"=>$row7['SUM(`Record_Prcie`)'], "Aug"=>$row8['SUM(`Record_Prcie`)'], "Sep"=>$row9['SUM(`Record_Prcie`)'], "Oct"=>$row10['SUM(`Record_Prcie`)'], "Nov"=>$row11['SUM(`Record_Prcie`)'], "Dec"=>$row12['SUM(`Record_Prcie`)']);
    $graph->addData($data);
    $graph->setTitle("Every Month to Cost");
    $graph->setTextColor("blue");
    $graph->createGraph();
?>