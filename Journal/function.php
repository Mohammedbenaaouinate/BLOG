 <?php
 function redirectInto($time=5){
    
        echo "<div class='alert alert-info container'>You will be dericet in Article After".$time."</div>";
        header("refresh:$time,url=articles.php");
        exit();
 }
 function backfunction($time=5){
        echo "<div class='alert alert-info container'>You will be dericet in Last Page  After".$time."</div>";
        $last = $_SERVER['PHP_SELF'];
        header("refresh:$time ; url=$last");
        exit();
}
 function redirectLogin($time=5){
        echo "<div class='alert alert-info container'>You will be dericet in Login After".$time."secondes </div>";
        header("refresh:$time,url=login.php");
        exit();
 }
 

 
?>