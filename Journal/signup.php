<?php

     session_start();
     include "init.php";
    $action= isset($_GET['action']) ? $_GET['action']:"formulaire";

    if($action == "formulaire"){
?>
                <section class="d-flex justify-content-center align-items-center mt-5">
                <form class="forml border mt-5 mb-5" action="signup.php?action=add" method="post">
                <h1 class="text-center text-black-50">Signup</h1>
                <hr class="mb-4">
                <div class="mb-4">
                    <input type="text" class="form-control" name="username"  placeholder="Saisir Votre User name">
                     <?php 
                        if(isset($_POST['e_username'])){
                            echo "<div class='change-color-error'>";
                                    echo "<p>*".$_POST['e_username']."</p>";
                            echo "</div>";
                        }
                     ?>
                </div>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Saisir Votre Email">
                    <?php 
                        if(isset($_POST['e_email'])){
                            echo "<div class='change-color-error'>";
                                    echo "<p>*".$_POST['e_email']."</p>";
                            echo "</div>";
                        }
                     ?>
                </div>
                <div class="mb-3">
                    <input type="password" name="password1" class="form-control" placeholder="Saisir Votre Password">
                    <?php 
                        if(isset($_POST['e_pass1'])){
                            echo "<div class='change-color-error'>";
                                    echo "<p>*".$_POST['e_pass1']."</p>";
                            echo "<div>";
                        }
                     ?>
                </div>
                <div class="mb-3">
                    <input type="password" name="password2" class="form-control" placeholder="Confirmer Votre Password ">
                    <?php 
                        if(isset($_POST['e_pass2'])){
                            echo "<div class='change-color-error'>";
                                    echo "<p>*".$_POST['e_pass2']."</p>";
                            echo "</div>";
                        }
                        elseif(isset($_POST['e_password'])){
                            echo "<div class='change-color-error'>";
                                    echo "<p>*".$_POST['e_password']."</p>";
                            echo "</div>";
                        }
                     ?>
                </div>
                <div class="mb-3">
                    <input type="text" name="fullname" class="form-control" placeholder="Saisir Votre Nom Complet">
                    <?php 
                        if(isset($_POST['e_fullname'])){
                            echo "<div class='change-color-error'>";
                                     echo "<p>*".$_POST['e_fullname']."</p>";
                            echo "</div>";
                        }
                     ?>
                </div>
                <div class="d-grid gap-2 col-lg-10 col-sm-10 mx-auto">
                        <button class="btn btn-primary  b-login mt-3" type="submit">Signup</button>
                </div>
                </form>
                </section>


<?php
    }elseif($action == "add"){
        if($_SERVER['REQUEST_METHOD']=="POST"){
                $username=$_POST['username'];
                $email=$_POST['email'];
                $pass1=$_POST['password1'];
                $pass2=$_POST['password2'];
                $fullname=$_POST['fullname'];
                $errors =array();
                if(empty($username)){
                    $errors["e_username"]=" The username  Cant be Empty";
                }
                if(empty($email)){
                    $errors["e_email"]="The Email Cant be Empty";
                }
                if(empty($pass1)){
                    $errors["e_pass1"]=" The Password Cant be Empty";
                }
                if(empty($pass2)){
                    $errors["e_pass2"]="The Password Confirmation  Cant be Empty";
                }
                if(empty($fullname)){
                    $errors["e_fullname"]="The Full name  Cant be Empty";
                }
                if($pass1!==$pass2){
                    $errors["e_password"]="The Password And Passowrd Confirmation not identique";
                }
                if(empty($errors)){
                        $statement = $con->prepare("INSERT INTO users (Username,Email,Fullname,Password) 
                                                                        VALUES
                                                                    (?,?,?,?)
                        ");
                        $statement->execute(array($username,$email,$fullname,$pass1));
                        if($statement->rowCount()>0){
                            echo "<div class='alert alert-success container'>Your Added In Data Base Width Succes Login To Acces In Your Page </div>";
                            $statement2=$con->prepare("SELECT * FROM users ORDER BY ID DESC LIMIT 1");
                            $statement2->execute(array());
                            $last_element=$statement2->fetch();
                            $_SESSION['Fullname']=$last_element['Username'];
                            $_SESSION['ID']=$last_element['ID'];
                            redirectInto(10);
                        }
    
                }
                else{
                ?>
                    <form action="signup.php?action=formulaire" method="post" id="formError">
                                <?php
                                      foreach($errors as $key=>$error){
                                        echo "<input type='text' name='$key' value='$error'>";
                                      }
                                ?>
                    </form>
                    <script>
                        document.getElementById('formError').submit();
                    </script>
                <?php

                }
        }
        else{
            echo "<div class='container alert alert-danger'>You Can't Aceess in This Page Directly</div>";
        }
    }
  
?>