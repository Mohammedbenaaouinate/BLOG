<?php 
        session_start();
        include "init.php";
        $action=isset($_GET['action'])?$_GET['action']:"noaction";
        if($action=="add"){
                if(isset($_SESSION['ID'])  && isset($_SESSION['Fullname'])){ ?>
                 <div class="container w-50 mt-5">
                    <form action="comment.php?action=Insert" method="POST">
                        <input type="hidden" name="articleid" value="<?php echo $_GET['ID']; ?>">
                          <input type="text" name="commentaire" class="form-control" placeholder="Add your comment">
                          <button type="submit" class="btn btn-primary mt-2"> Submit</button>
                    </form>
                 </div>

               <?php }
                else{
                    echo "<div class='container alert alert-danger'>You Should Login For Add Comment</div>";
                }

        }
        elseif($action=="Insert"){
            if($_SERVER['REQUEST_METHOD']=="POST"){
                    $commentaire=$_POST['commentaire'];
                    $user_id=$_SESSION['ID'];
                    $article_id =$_POST['articleid'];
                    $statement = $con->prepare("INSERT INTO comments(ID_User,ID_Article,comment,Date)
                                                        VALUES (?,?,?,now())    
                                                            
                                                        ");
                    $statement->execute(array($user_id,$article_id,$commentaire));
                    if($statement->rowCount()>0){
                        echo "<div class='container alert alert-info'>Your Comment Are Added</div>";
                        redirectInto(10);
                    }
                    else{
                        echo "<div class='container alert alert-danger'>Your Comment Can't Added Added</div>";
                        redirectInto(10);
                    }


            }
            else{
                echo "<div class='container alert alert-danger'>Your Comment Can't Access Directly In This Page</div>";
                redirectInto(10);
            }
        }
        elseif($action=="view"){
             $article_id=$_GET['ID'];
             echo "<div class='container pt-2'>";
             if(!empty($article_id)){
                        $statement=$con->prepare("SELECT comments.comment ,users.Fullname,comments.Date FROM comments INNER JOIN
                                                                     users 
                                                                     ON comments.ID_User=users.ID 
                                                                     INNER JOIN article 
                                                                     ON comments.ID_Article=article.ID
                                                                     WHERE article.ID=? ORDER BY DATE DESC
                        
                        ");
                        $statement->execute(array($article_id));
                        $rows = $statement->fetchAll();
                        if($statement->rowCount()>0){
                            foreach($rows as $row){
                                echo "<div class='border mt-4 mb-2'>";
                                       echo "<p class='text-center text-black-50'><strong>The user:   </strong>".$row['Fullname']."      "."<strong>Comment Date:      </strong>".$row['Date']."</p>";
                                       echo "<p class='text-center'>".$row['comment']."</p>";
                                echo "</div>";
                            }
                        }
              echo "</div>";
             }
             else{
                echo "<div class='container alert alert-danger'>Why you Want to change ID hhhhh But I haven't Proble because your ID saved In the SESSION SO ANY YOU ARE THE RESPONSIBLE</div>";
             }

        }
        
?>