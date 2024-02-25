<?php 
   session_start();
   include "init.php";
?>
 <section class="Aboutus d-flex container text-center justify-content-center align-items-center">
                        <h1 class="text-black-50 mt-2"> About nos services </h1>
                        <hr>
 </section>
 <section class="ourgols mt-5">
    <div class="container">
         <div class="row">
         <h1 class="text-center text-black-50">Our  Gols</h1>
         <hr class="mb-5">
            <div class="col-lg-6 col-md-6 col-sm-12">
               <div class="our-content d-felx justify-content-center align-items-center">
                        <h1 class="text-center">Our Gols</h1>
                        <p class="text-center">Notre site web est une plateforme dynamique conçue pour permettre à ses utilisateurs
                            d'ajouter des articles dans le but de créer un espace enrichissant et collaboratif. 
                            Nos objectifs principaux incluent :
                        </p>
                        <ul class="list-unstyled">
                           <li><i class="bi bi-check-lg"></i>Ajout d'articles pour faciliter le partage d'informations pertinentes.</li>
                           <li><i class="bi bi-check-lg"></i>Edition des articles pour encourager l'expression des idées et des opinions.</li>
                           <li><i class="bi bi-check-lg"></i>Consultation des articles pour fournir un espace interactif pour la communauté.</li>
                           <li><i class="bi bi-check-lg"></i>Facilitation de l'information pour promouvoir la collaboration et l'échange de connaissances.</li>
                        </ul>
               </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
               <div class="img-ourgols d-felx justify-content-center align-items-center">
                  <img  class="img-fluid" src="images/goal.webp">

               </div>
            </div>

         </div>
    </div>
 </section>
 <section class="ourteam mt-5 mb-5">
   <div class="container">
      <div class="row">
                  <h1 class="text-center text-black-50">Our Team</h1>
                  <hr>
                  <div class="col-lg-4 col-md-4 col-sm-6 mt-4">
                        <div class="text-center">
                              <div class="image_team d-flex justify-content-center align-items-center">
                                    <img class="img-fluid" src="images/person1.jpg">
                              </div>
                              <div class="personal_information">
                                    <h5>Mohammed BENAAOUINATE</h5>
                                    <p>Le Designeur du Site Web</p>
                              </div>
                              <div class="social_media d-flex justify-content-center align-items-center">
                                   <ul class="list-group list-group-horizontal text-center">
                                          <li class="list-group-item"><i class="bi bi-facebook"></i><a href="#"></a></li> 
                                          <li class="list-group-item"><i class="bi bi-linkedin"></i><a href="#"></a></li> 
                                          <li class="list-group-item"><i class="bi bi-github"></i><a href="#"></a></li>
                                          <li class="list-group-item"> <i class="bi bi-instagram"></i><a href="#"></a></li>  
                                   </ul>
                                   
                              </div>
                        </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-6 mt-4">
                        <div class="text-center">
                              <div class="image_team d-flex justify-content-center align-items-center">
                                    <img class="img-fluid" src="images/person1.jpg">
                              </div>
                              <div class="personal_information">
                                    <h5>Mohammed Riane Reda</h5>
                                    <p>Bootsrtap And React Consultant</p>
                              </div>
                              <div class="social_media d-flex justify-content-center align-items-center">
                                   <ul class="list-group list-group-horizontal text-center">
                                          <li class="list-group-item"><i class="bi bi-facebook"></i><a href="#"></a></li> 
                                          <li class="list-group-item"><i class="bi bi-linkedin"></i><a href="#"></a></li> 
                                          <li class="list-group-item"><i class="bi bi-github"></i><a href="#"></a></li>
                                          <li class="list-group-item"> <i class="bi bi-instagram"></i><a href="#"></a></li>  
                                   </ul>
                                   
                              </div>
                        </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-6 mt-4">
                        <div class="text-center">
                              <div class="image_team d-flex justify-content-center align-items-center">
                                    <img class="img-fluid" src="images/person1.jpg">
                              </div>
                              <div class="personal_information">
                                    <h5>Isam Tfares</h5>
                                    <p>PHP Consultant</p>
                              </div>
                              <div class="social_media d-flex justify-content-center align-items-center">
                                   <ul class="list-group list-group-horizontal text-center">
                                          <li class="list-group-item"><i class="bi bi-facebook"></i><a href="#"></a></li> 
                                          <li class="list-group-item"><i class="bi bi-linkedin"></i><a href="#"></a></li> 
                                          <li class="list-group-item"><i class="bi bi-github"></i><a href="#"></a></li>
                                          <li class="list-group-item"> <i class="bi bi-instagram"></i><a href="#"></a></li>  
                                   </ul>
                                   
                              </div>
                        </div>
                  </div>
       </div>
   </div>

 </section>
 <section class="contactUs border">
      <div class="container">
          <div class="row">
                        <h1 class="text-center text-black-50">ContactUs</h1>
                        <hr class="mb-5">

                        <div class="col-lg-6 col-md-6 lo-sm-12">
                              <div class="image_contact_us">
                                    <img class="img-fluid" src="images/contact.gif">
                              </div>
                        </div>
                        <div class="col-lg-6 col-md-6 lo-sm-12">
                              <div class="formulaire ml-5">
                                    <form action="formulaire.php" method="POST">
                                          <div class="mb-3">
                                             <input type="text" name ="name" class="form-control" placeholder="Saisir Votre Nom" required>
                                          </div>
                                          <div class="mb-3">
                                              <input type="email" name="email" class="form-control" placeholder="Saisir Votre Email" required>
                                          </div>
                                          <div class="mb-3">
                                             <textarea type="text" class="form-control" name="cause" placeholder="Saisir Le Probleme Que Vous Avez recontrer" required></textarea>
                                          </div>
                                          <button type="submit" class="btn btn-primary">SEND DEMAND</button>
                                    </form>
                              </div>
                        </div>
          </div>
      </div>
 </section>
 <footer class="d-flex justify-content-center align-items-center">
      <div class="mt-4 container">
            <p class="text-center">All Right Reserved</p>
            <p class="text-center">Designed By Mohammed BENAAOUINATE</p>
            <p class="text-center">Big Thanks to : Isam Tfares</p>
      </div>
 </footer>
<?php
   include "footer.php";
?>