<?php
   session_start();
   include "init.php";
   $article_id=$_GET['ID'];
   $statement = $con->prepare("SELECT * FROM article WHERE ID=?");
   $statement->execute(array($article_id));
   $row= $statement->fetch();
   if($statement->rowCount()>0){
      echo "<div class='container mt-5'>";
      echo "<div class='row w-70 mx-auto mt-3 border'>";
                            echo "<div class='col-lg-3 col-md-6 col-sm-6 myarticle mb-3'>";
                                        echo "<img class='img-fluid edit-image-article' src='".$row['img_path']."'>";

                            echo "</div>";
                            echo "<div class='col-lg-8 col-md-6 col-sm-6'>";
                                 echo "<h5 class='mb-0'>".$row['header']."</h5>";
                                 echo "<span class='text-black-50 fs-6'>published in: ".$row['Date_pub']."</span>";
                                 echo "<p class='lead'>".$row['pub']."</p>";
                           echo "</div>";
      echo "</div>";
      echo "</div>";
   }
   else{
      echo "<div class='container alert alert-danger'>This Article didn't Exsit </div>";
   }
?>