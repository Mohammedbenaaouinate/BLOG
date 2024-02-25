<?php 
        session_start();
       include "init.php";
       $action =isset($_GET['action'])? $_GET['action']:"noaction";
       if($action=="checkuser"){
                $email=$_POST['emailuser'];
                $password=$_POST['password'];
                $statement=$con->prepare("SELECT * FROM users Where  Email= ? AND Password=? ");
                $statement->execute(array($email,$password));
                $fetchelement = $statement->fetch();
                $chekexsit=$statement->rowCount();
                if($chekexsit==1){
                    $_SESSION['Fullname']=$fetchelement['Username'];
                    $_SESSION['ID']=$fetchelement['ID'];
                    header("Location:articles.php");
                    exit();
                }
                else{
                    $error="This Count Information Didn't Exist check Your email And Passwod";
                }
       }
        ?>
<form class="forml border mt-5" action="login.php?action=checkuser" method="post">
  <h1 class="text-center text-black-50">Login</h1>
  <hr class="mb-5">
  <?php  
            if(!empty($error)){
              echo "<div class='container alert alert-danger'>".$error."</div>";
            }
  ?>
  <div class="mb-4">
    <input type="email" class="form-control" name="emailuser" aria-describedby="emailHelp" placeholder="Saisir Votre email">
  </div>
  <div class="mb-3">
    <input type="password" name="password" class="form-control" placeholder="Saisir Votre Password">
  </div>
  <div class="d-grid gap-2 col-lg-10 col-sm-10 mx-auto">
        <button class="btn btn-primary  b-login mt-3" type="submit">Login</button>
        <div class="link mt-4 text-center">
         <p>Heven't Account ? <a href="signup.php">SignupHere</a></p>
        </div>
  </div>
</form>

