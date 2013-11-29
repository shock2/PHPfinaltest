<?php          
     session_start();
     
     include 'conDB.php';
     
     $name= empty($_POST['name']) ?"": $_POST['name'];
     $password= empty($_POST['password']) ?"": $_POST['password'];
     
     $M_rpassword='';
     $rpassword='';
     
     $_SESSION['login']=0;
     
     $M_SQL="select MP_Password, MP_Name from MP where MP_Username ="."'".$name."'" ;
     
     $M_result = mysql_query($M_SQL);
     $result = mysql_query($SQL); 
     
     while ($M_data = mysql_fetch_array($M_result)){
     $M_rpassword=$M_data['MP_Password'];
     $_SESSION['MP_Name']=$M_data['MP_Name'];
     break;
     }
     
     if(isset($M_rpassword) and $M_rpassword==$password and $name!="" and $password!="")
     {
         $_SESSION['login']=1;
         $_SESSION['M_name']=$name;
     }
     if($_SESSION['login']==0 ){
         header("Location: Login.php");    
     }
     if($_SESSION['login']==1){
         header("Location: My.php");          
     }
?>
