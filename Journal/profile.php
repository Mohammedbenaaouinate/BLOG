<?php
        session_start();
        include "init.php";
        $action = isset($_GET['action'])? $_GET['action'] : "noaction";
        if(isset($_SESSION['Fullname']) && isset($_SESSION['ID'])){
                if($action == "view"){
                        $ID= $_SESSION['ID'];
                        $statement=$con->prepare("SELECT * FROM users WHERE ID = ?");
                        $statement->execute(array($ID));
                        $row =$statement->fetch();
                        //GET Number Of Article Pulished By One Person
                        $statement2=$con->prepare("SELECT * FROM article where 	User_ID =?");
                        $statement2->execute(array($ID));
                        $N_Articles=$statement2->rowCount();
                        if($statement->rowCount()>0){
                                echo "<div class='container border text-center mt-5 mb-5'>";
                                echo "<h1 class='text-black-50 p-3'>My Compte Information </h1>";
                                echo "<hr>";
                                         echo  "<div class='row'>";
                                                        echo "<div class='col-md-6 colo-lg-6 col-sm-12'>";
                                                        echo "<img src='" . $row['profil_image'] . "' class='rounded mx-auto d-block editimage mt-5' onerror=\"this.onerror=null;this.src='profileimgs/profile.jpg';\">";
                                                        echo '<i class="bi bi-pencil mt-2 imageicon"><a href="profile.php?action=Editimage">Edit-Image</a></i>';
                                                        echo "<p class='lead p-4 text-black-50'>".$row['Fullname']."</p>";
                                                        echo "</div>";
                                                echo "<div class='col-md-6 colo-lg-6 col-sm-12 d-flex justify-content-center align-items-center'>";
                                                                echo  "<table class='table table-striped'>";
                                                                                echo "<tr>";
                                                                                        echo "<td> <strong>Username</strong></td>";
                                                                                        echo "<td>".$row['Username']."</td>";
                                                                                echo "</tr>";
                                                                                echo "<tr>";
                                                                                                echo "<td> <strong>Email</strong></td>";
                                                                                                echo "<td>".$row['Email']."</td>";
                                                                                echo "</tr>";
                                                                                echo "<tr>";
                                                                                                echo "<td> <strong>Fullname</strong></td>";
                                                                                                echo "<td>".$row['Fullname']."</td>";
                                                                                echo "</tr>";
                                                                                echo "<tr>";
                                                                                                echo "<td> <strong>The  number of articles published</strong></td>";
                                                                                                echo "<td>".$N_Articles."</td>";
                                                                                echo "</tr>";
                                                                echo "</table>";
                                                echo "</div>";
                                          echo "</row>";
                                echo "</div>";
                        }
                        else{
                            echo "<div class='container alert alert-danger'>This User Information didn't Exist</div>";
                            redirectLogin(10);
                        }


                }
                elseif($action=="Editimage"){?>
                         <div class='Editomage d-flex justify-content-center align-items-center'>
                                 <div class='container border mt-5 w-50 p-5'>
                                         <h1 class='text-black-50 text-center'>Edit Your Image</h1>
                                         <form action="?action=changeimage" method='POST' enctype='multipart/form-data'>
                                                 <div class="mb-3">
                                                 <label for="exampleFormControlInput1" class="form-label mb-4">Choisir Votre Image</label>
                                                 <input type="file" class="form-control" id="exampleFormControlInput1" name="image">
                                                 </div>
                                                 <input class="btn btn-primary" type="submit" value="SubmitChanges">
                                         </form>
                                 </div>
                         </div>

               <?php }
                elseif($action=="changeimage"){
                      
                                if($_SERVER['REQUEST_METHOD']=="POST"){
                                        echo "<div class='container'>";
                                                echo "<h1 class='text-center text-black-50 mt-5'>Hello in Change image page</h1>";
                                                $filedir="profileimgs/";
                                                $image_name=$_FILES['image']['name'];
                                                $image_path = $filedir .rand(10,1000000).$image_name;
                                                move_uploaded_file($_FILES["image"]["tmp_name"],$image_path);
                                                $statement = $con->prepare("UPDATE  users SET profil_image=? Where ID=?");
                                                $statement->execute(array($image_path,$_SESSION['ID']));
                                                echo "<div class='container alert alert-info'>You image Are Uplodad</div>";
                                        echo "</div>";
                                        
                                }
                                else{
                                        echo "<div class='container alert alert-danger'>You can't Access Directly To This Page</div>";
                                        backfunction(10);
                                }
                }
                elseif($action=="Editprofile"){
                            $ID=$_SESSION['ID'];
                            $statement = $con->prepare("SELECT * FROM users WHERE ID=? LIMIT 1");
                            $statement->execute(array($ID));
                            $row = $statement->fetch();
                            if($statement->rowCount()>0){   ?>
                                                <section class="d-flex justify-content-center align-items-center mt-5">
                                                <form class="forml border mt-5 mb-5" action="profile.php?action=updateprofile" method="post">
                                                <h1 class="text-center text-black-50">Edit Profile</h1>
                                                <hr class="mb-4">
                                                <div class="mb-4">
                                                <input type="text" class="form-control" name="username" value="<?php echo $row['Username']?>"  placeholder="Saisir Votre User name">
                                                <?php 
                                                        if(isset($_POST['e_username'])){
                                                        echo "<div class='change-color-error'>";
                                                                echo "<p>*".$_POST['e_username']."</p>";
                                                        echo "</div>";
                                                        }
                                                ?>
                                                </div>
                                                <div class="mb-3">
                                                <input type="email" name="email" class="form-control" value="<?php echo $row['Email']?>" placeholder="Saisir Votre Email">
                                                                        <?php 
                                                                                if(isset($_POST['e_email'])){
                                                                                echo "<div class='change-color-error'>";
                                                                                        echo "<p>*".$_POST['e_email']."</p>";
                                                                                echo "</div>";
                                                                                }
                                                                        ?>
                                                </div>
                                                <div class="mb-3">
                                                <input type="password" name="password1" class="form-control" value="<?php echo $row['Password']?>" placeholder="Saisir Votre Password">
                                                                        <?php 
                                                                                if(isset($_POST['e_pass1'])){
                                                                                echo "<div class='change-color-error'>";
                                                                                        echo "<p>*".$_POST['e_pass1']."</p>";
                                                                                echo "<div>";
                                                                                }
                                                                        ?>
                                                </div>
                                                <div class="mb-3">
                                                <input type="password" name="password2" class="form-control"  value="<?php echo $row['Password']?>"  placeholder="Confirmer Votre Password ">
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
                                                <input type="text" name="fullname" class="form-control"  value="<?php echo $row['Fullname']?>"  placeholder="Saisir Votre Nom Complet">
                                                                                        <?php 
                                                                                                if(isset($_POST['e_fullname'])){
                                                                                                echo "<div class='change-color-error'>";
                                                                                                        echo "<p>*".$_POST['e_fullname']."</p>";
                                                                                                echo "</div>";
                                                                                                }
                                                                                        ?>
                                                </div>
                                                <div class="d-grid gap-2 col-lg-10 col-sm-10 mx-auto">
                                                        <button class="btn btn-primary  b-login mt-3" type="submit">Savechanges</button>
                                                </div>
                                                </form>
                                                </section>

         <?php }
       }
       elseif($action=="updateprofile"){
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
                        $statement = $con->prepare(" UPDATE users SET  Username=?,Email=?,Fullname=?,Password=?
                                                                WHERE ID=?
                                                                "); 
                                                                      
                        $statement->execute(array($username,$email,$fullname,$pass1,$_SESSION['ID']));
                        if($statement->rowCount()>0){
                            $_SESSION['Fullname']=$username;
                            echo "<div class='alert alert-success container'>Your Information are UPDATED  </div>";
                            redirectInto(10);
                        }
    
                }
                else{
                ?>
                    <form action="profile.php?action=Editprofile" method="post" id="formError">
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
       }
        }
       else{ echo "<div class='container alert alert-danger'>This User Didn't Exist In DATA BASE</div>";
    }
?>