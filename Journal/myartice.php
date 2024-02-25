<?php
    session_start();
    include "init.php";
    $action = isset($_GET['action'])? $_GET['action'] :"Manage";
    if($action=="Manage"){
            if(isset($_SESSION['Fullname']) && isset($_SESSION['ID'])){
                $userID=$_SESSION['ID'];
                $statement = $con->prepare("SELECT * FROM article WHERE User_ID=? ORDER BY ID DESC");
                $statement->execute(array($userID));
                $rows= $statement->fetchAll();
                if($statement->rowCount()>0){
                    echo "<div class='container mt-5'>";
                    echo "<div class='Myarticles'>";
                    echo "<h1 class='text-center text-black-50 mb-0'>Manage Your Articles</h1>";
                    echo "<hr class='mb-5 text-center'>";
                    foreach($rows as $row){
                        echo "<div class='row mt-3 border'>";
                            echo "<div class='col-lg-3 col-md-6 col-sm-6 myarticle mb-3'>";
                                        echo "<img class='img-fluid edit-image-article' src='".$row['img_path']."'>";

                            echo "</div>";
                            echo "<div class='col-lg-8 col-md-6 col-sm-6'>";
                                    echo "<h5 class='mb-0'>".$row['header']."</h5>";
                                    echo "<span class='text-black-50 fs-6'>published in: ".$row['Date_pub']."</span>";
                                    if(strlen($row['pub'])<=300){
                                        echo "<p class='lead'>".$row['pub']."</p>";
                                    }
                                    else{
                                        echo "<p>".substr($row['pub'],0,300)."</p>";
                                        echo "<a href='Viewmore.php?ID=".$row['ID']."'>View More</a>";
                                    }
                                    echo "<div class='ch-icons mb-3 mt-3'>";
                                            echo "<span class='edit-icon'><i class='bi bi-pencil'></i><a href='myartice.php?action=Edit&id=".$row['ID']."'>Edit</a></span>";
                                            echo "<span class='delete-icon'><i class='bi bi-archive'></i><a href='myartice.php?action=Delete&id=".$row['ID']."'>DELETE</a></span>";
                                    echo "</div>";
                            echo "</div>";
                        echo "</div>";
                    }
                    echo '<a class="btn btn-primary mt-5 mb-5" href="articles.php?action=add" role="button">AddArticle</a>'; 
                    echo "</div>";
                    echo "</div>";
                }
                else{
                    echo "<div class='container alert alert-danger'>You have not Articles </div>";
                    echo '<a class="btn btn-primary mt-5 mb-5 btn-lg" href="articles.php?action=add">AddArticle</a>'; 
                }

    }
    else{
            echo "<div class='alert alert-danger container'>You Should Login To Acces This Page </div>";
            redirectInto(10);

    }
}elseif($action=="Edit"){
                $article_id = $_GET['id'];
                $statement = $con->prepare("SELECT * FROM article Where ID = ? ");
                $statement->execute(array($article_id));
                $row= $statement->fetch();
                if($row['User_ID']==$_SESSION['ID']){?>
                    <div class="container mt-5">
                    <h1 class="text-center text-black-50">Edit Your Article</h1>
                    <hr class="mb-5 text-center">
                    <form class="forml" action="myartice.php?action=update" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <input type="hidden" name="hiddenid" value="<?php echo $row['ID'] ?>">
                                        <input type="text" class="form-control" name="titre" placeholder="Saisir Le Titre de Votre Article" value="<?php echo $row['header'] ?>">
                                    </div>
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" name="text"  placeholder="Write Contenue Of Your Article"  style="height: 100px"><?php echo $row['pub'] ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                    <input class="btn btn-primary" type="submit" value='Edit Article'>
                    </form>
                <div>
               <?php }
                else{
                            echo "<div class='container alert alert-danger'>You Are n't the Owner of This Article </div>";
                            backfunction(10);
                }
                ?>
                

<?php }
elseif($action=="update"){
    echo "<div class='container'>";
    echo "<h1 class='text-center'>Hello in Your UPDATE Page</h1>";
    echo "<hr class='text-center'>";
    if($_SERVER['REQUEST_METHOD']=="POST"){
            $article_id=$_POST['hiddenid'];
            $header=$_POST['titre'];
            $text_artice= $_POST['text'];
            $file_name = $_FILES['image']['name'];
            if(!empty($file_name)){
                $file_PATH ="img/".rand(1,1000000000).$file_name;
            }
            else{
                $statement3=$con->prepare("SELECT * FROM article WHERE ID= ?");
                $statement3->execute(array($article_id));
                $row=$statement3->fetch();
                $file_PATH=$row['img_path'];
            }
            $statement1 = $con->prepare("SELECT * FROM article WHERE ID =? LIMIT 1");
            $statement1->execute(array($article_id));
            $row =$statement1->fetch();
            if($_SESSION['ID']==$row['User_ID']){
                move_uploaded_file($_FILES['image']['tmp_name'],$file_PATH);
                $statement= $con->prepare("UPDATE article SET header=?, pub =? ,img_path=? WHERE ID=?");
                $statement->execute(array($header,$text_artice,$file_PATH,$article_id));
                echo "<div class='alert alert-success'>You Article UPDATED Width Succes</div>";
                redirectInto(10);
            }else{
                echo "<div class='container alert-alert-success'>You are not The Owner Of This Article</div>";
            }

    }
    else{
        echo "<div class='alert alert-danger'> You Can't Access in This Page Directly</div>";
    }
   echo "</div>";


}
elseif($action=="Delete"){
    $article_id=$_GET['id'];
    $statement = $con->prepare("SELECT * FROM article WHERE ID=? LIMIT 1");
    $statement->execute(array($article_id));
    $row=$statement->fetch();
    if($statement->rowCount()>0){
            if($row['User_ID']==$_SESSION['ID']){
                $statement =$con->prepare("DELETE FROM article WHERE ID=?");
                $statement -> execute(array($article_id));
                echo "<div class='alert alert-success'> The Element Deleted From Data Base </div>";
                redirectInto(10);
            }else{
                echo "<div class='container alert alert-danger mt-5'>You Are not The owner of This Article So You can't DELETED</div>";
                redirectInto(10);
            }
           
    }
    else{
        echo "<div class='container alert alert-danger'>This Article Didn't Exist </div>";
    }
}
?>