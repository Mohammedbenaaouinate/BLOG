<?php 
        session_start();
        include "init.php";
        if($_SERVER['REQUEST_METHOD']=="POST"){
                $name = $_POST['name'];
                $email= $_POST['email'];
                $text = $_POST['cause'];
                $statemet = $con->prepare("INSERT INTO formulaire(Nom,Email,problem)
                                        VALUES 
                                        (?,?,?)

                ");
                $statemet->execute(array($name,$email,$text));
                if($statemet->rowCount()>0){
                    echo"<div class=' container alert alert-info'>Your request is successfully registered</div>";
                    redirectInto(10);
                }
                
        }
        else{
            echo "<div class='container alert alert-danger'>You shouldn't Access ti This Page Width This Method</div>";
        }

?>