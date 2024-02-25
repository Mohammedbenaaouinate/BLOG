<?php
        session_start();
        include "init.php";
        $action =isset($_GET['action']) ? $_GET['action'] :"Manage";
        if($action=="Manage"){
        ?>
        <div class="container mt-5">
                <?php echo "<h1 class='text-center text-black-50 mb-0'> Hello In Your Article Page</h1>";
                echo "<hr class='mb-5 text-center'>";
                $statement2 = $con->prepare("SELECT * FROM article ORDER BY ID DESC");
                $statement2->execute(array());
                $rows=$statement2->fetchAll();
                if($statement2->rowCount()>0){
                    foreach($rows as $row){
                        $statement2 = $con ->prepare("SELECT * from users Where ID =? LIMIT 1");
                        $statement2->execute(array($row['User_ID']));
                        $user_info=$statement2->fetch();

                        echo "<div class='row mt-4 border'>";
                                echo '<div class="col-lg-4 col-md-6 col-sm-6">';
                                        echo "<img class='img-fluid edit-image-article' src=' ".$row['img_path']."'>";
                                echo "</div>";
                                echo "<div class='col-lg-8 col-md-6 col-sm-6 mb-3'>";
                                        echo "<h5>".$row['header']."</h5>";
                                        echo "<span class='text-black-50 fs-6'>published in: ".$row['Date_pub']."</span>";
                                        echo "<span class='text-black-50 fs-6 d-block'>published by: ".$user_info['Fullname']."</span>";
                                        if(strlen($row['pub'])<=300){
                                            echo "<ul class='list-unstyled list-inline'>";
                                            echo "<p class='lead'>".$row['pub']."</p>";
                                        }
                                        else{
                                            echo "<p>".substr($row['pub'],0,300)."</p>";
                                            echo "<ul class='list-unstyled list-inline'>";
                                            echo "<li class='list-inline-item mb-2'><a class='edit-link' href='Viewmore.php?ID=".$row['ID']."'>View More</a></li>";                                            
                                        }
                                        echo "<li class='list-inline-item mb-2'><a class='edit-link' href='comment.php?action=add&ID=".$row['ID']."'>Addcomment</a></li>";
                                        echo "<li class='list-inline-item mb-2'><a class='edit-link' href='comment.php?action=view&ID=".$row['ID']."'>View Comment</a></li>";
                                        echo "</ul>";
                                echo "</div>";
                        echo "</div>";
                    }
                } 
                else{
                    echo "<div class='alert alert-danger'>She didn't Exist Any Element</div>";
                }    
                ?>
                
<?php
}elseif($action=="add"){
                    if(isset($_SESSION['ID']) && isset($_SESSION['Fullname'])){
                    echo "<div class='container'>";
                    echo "<h1 class='text-center mb-3 text-black-50'>Hello In Add Page</h1>";
                    ?>
                    <form class="formarticle" action="articles.php?action=Insert" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <input type="hidden" name="hiddenid" value="<?php echo $_SESSION['ID'] ?>">
                                    <input type="text" class="form-control" name="titre" placeholder="Saisir Le Titre de Votre Article">
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" name="text"  placeholder="Write Contenue Of Your Article"  style="height: 100px"></textarea>
                                </div>
                                <div class="mb-3">
                                    <input type="file" class="form-control" name="image">
                                </div>
                                <input class="btn btn-primary" type="submit" value='Add Article'>
                    </form>
                    <?php
                     }
                     else{
                                echo "<div class='alert alert-danger container'> You should Login  To AddArticle </div>";

                     }
                     ?>


<?php  echo "</div>"; 
}elseif($action=="Insert"){
            echo "<div class='container'>";
            echo "<h1 class='text-center text-black-50'>Hello in Your Insert Page</h1>";
            if($_SERVER['REQUEST_METHOD']=="POST"){
                    $user_id=$_POST['hiddenid'];
                    $header=$_POST['titre'];
                    $text_artice= $_POST['text'];
                    $file_name = $_FILES['image']['name'];
                    $file_PATH ="img/".rand(1,100000000).$file_name;
                    move_uploaded_file($_FILES['image']['tmp_name'],$file_PATH);
                    $statement= $con->prepare("INSERT INTO article(User_ID,header,pub,Date_pub,img_path)
                                                        VALUES
                                                (?,?,?,now(),?)");
                    $statement->execute(array($user_id,$header,$text_artice,$file_PATH));
                    echo "<div class='alert alert-success'>You Article Added Width Succes</div>";
                    redirectInto(5);
                                                        
            }
            else{
                echo "<div class='alert alert-danger'> You Can't Access in This Page Directly</div>";
            }
            echo "</div>";
}
   
?>
</div>