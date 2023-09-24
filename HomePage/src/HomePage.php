<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css?v=15" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6"
      crossorigin="anonymous"
    />
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script type="text/javascript">
      $(window).on("scroll", function () {
        if ($(window).scrollTop()) {
          $(".nav-bar").addClass("white");
        } else {
          $(".nav-bar").removeClass("white");
        }
      });
    </script>
  </head>
  <body>
    <!--NAVIGATION BAR-->
    <!--NAV BAR HERE-->
    <div class="nav-bar">
      <div class="container">
        <a href="#" class="logo">Dialyse<span>Center</span></a>
        
        <img
        Mobile-menu 
          src="../media/Menu4.svg"
          id="mobile-menu"
          alt="mobile-menu"
          class="Mobile-menu"
        />

        <nav>
          <ul class="first-part">
            <li class="current"><a href="#">Acceuil</a></li>
            <li><a href="#who">FAQ</a></li>
            <li><a href="#Nos-services">Services</a></li>
          </ul>
          <ul class="second-part">
            <li><a href="#renseignement">Contact</a></li>
            <li class="Connexion"><a href="../../src/PageSignUp.php?Error=0&Page">Connexion</a></li>
          </ul>
        </nav>
      </div>
    </div>

    <!--SLIDE SHOW -->

    <div class="slideShowHero">
      <div
        id="carouselExampleSlidesOnly"
        class="carousel carousel-fade"
        data-bs-ride="carousel"
        data-bs-pause="false"
      >
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img
              src="../media/slides/slide5.jpg"
              class="d-block w-100"
              alt="..."
            />

            <div class="carousel-caption caption-cust">
              <h2 class="line"></h2>
              <p>"Décidons ensemble de vivre mieux "</p>
            </div>
          </div>
          <div class="carousel-item">
            <img
              src="../media/slides/slide6.jpg"
              class="d-block w-100"
              alt="..."
            />
            <div class="carousel-caption caption-cust">
              <h2 class="line"></h2>
              <p>"La gaieté est la moitié de la santé".</p>
            </div>
          </div>
          <div class="carousel-item">
            <img
              src="../media/slides/slide7.jpg"
              class="d-block w-100"
              alt="..."
            />
            <div class="carousel-caption caption-cust">
              <h2 class="line"></h2>
              <p>"Adopter le bon traitement "</p>
            </div>
          </div>
          <div class="carousel-item">
            <img
              src="../media/slides/slide8.jpg"
              class="d-block w-100"
              alt="..."
            />
            <div class="carousel-caption caption-cust">
              <h2 class="line"></h2>
              <p>"Seul dans le passé ensemble dans le futur "</p>
            </div>
          </div>
          <div class="carousel-item">
            <img
              src="../media/slides/slide9.jpg"
              class="d-block w-100"
              alt="..."
            />
            <div class="carousel-caption caption-cust">
              <h2 class="line"></h2>
              <p>We Provide the best health equipements.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img
              src="../media/slides/slide10.jpg"
              class="d-block w-100"
              alt="..."
            />
            <div class="carousel-caption caption-cust">
              <h2 class="line"></h2>
              <p>Que ton alimentation soit ta première médecine.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img
              src="../media/slides/slide11.jpg"
              class="d-block w-100"
              alt="..."
            />
            <div class="carousel-caption caption-cust">
              <h2 class="line"></h2>
              <p>Ne mettez pas votre santé sur <span>PAUSE</span>!!</p>
            </div>
          </div>
          <div class="carousel-item">
            <img
              src="../media/slides/slide12.jpg"
              class="d-block w-100"
              alt="..."
            />
            <div class="carousel-caption caption-cust">
              <h2 class="line"></h2>
              <p>Ne mettez pas votre santé sur <span>PAUSE</span>!!</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="info">
      <div class="element">
        <img src="../media/ambulance.svg" alt="i1" />
        <h1>Service d’urgence</h1>
        <h2></h2>
        <p>
          On garantit le déplacement des malades avec les differents types
          d’ambulance
        </p>
      </div>
      <div class="element">
        <img src="../media/patient.svg" alt="i2" />
        <h1>Medecins a domicile</h1>
        <h2></h2>
        <p>
          Des Consultations et soins fournis par nos médecins pour répondre a
          tous vos besoins dans les meilleurs conditions
        </p>
      </div>
      <div class="element">
        <img src="../media/Stethoscope.svg" alt="i3" />
        <h1>Régulation médicale</h1>
        <h2></h2>
        <p>
        Il s’agit d’évaluer le degré d’urgence de la situation médicale qui a fait l’objet de l’appel, pour donner au patient la réponse la plus adaptée.
        </p>
      </div>
      <div class="element">
        <img src="../media/Liste.svg" alt="i4" />
        <h1>Suivi de qualité</h1>
        <h2></h2>
        <p>
          Un dossier médical informatisé qui va assurer les meilleurs
          performances de votre suivi médical
        </p>
      </div>
    </section>

    <!--WHO SECTION-->
    <section class="who" id="who">
      <h1>Qui sommes nous <span>!</span></h1>
      <div class="whodisp">
        <p>
        DialyseCenter est un centre de dialyse dédiés à l’assistance médicale des personnes dialysés .Sa vocation est d’offrir en temps réel les ressources, l’expertise et la logistique nécessaire pour une assistance médicale personnalisée et cela grâce à des compétences humaines avérées disposant de moyens logistiques et équipements médicaux modernes avec l’ultime objectif de répondre aux besoins de nos patients. Dialyse Center® vous accompagne efficacement. Notre devise est d’assurer  la disponibilité d’experts de qualité médicale et paramédicale avec des standards internationaux, avec des offres de soins spécifiquement conçues.
        </p>
        <img src="../media/DOCS.jpg" alt="image doc" />
      </div>
    </section>

    <section class="Nos-services" id="Nos-services">
      <h1>Nos services</h1>
      <div class="les-services overlay">
        <div class="card">
          <div class="image">
            <img src="../media/2.jpg" alt="Carte" />
          </div>
         <center>
         <div class="caption">une équipe médicale qualifiée.</div>
         </center>  
       </div>
        <div class="card">
          <div class="image">
            <img src="../media/1.jpg" alt="Carte" />
          </div>
          <center><div class="caption">Possibilité de contacter vos medecins</div>
        </center></div>
        <div class="card">
          <div class="image">
            <img src="../media/card.svg" alt="Carte" />
          </div>
          <center><div class="caption">Dossier Médical Informatisé.</div>
       </center> </div>
        
        <div class="card">
          <div class="image">
            <img src="../media/3.jpg" alt="Carte" />
          </div>
          <center><div class="caption">Un compte personnel.</div>
        </center></div>

        <div class="card cardLast">
          <div class="image">
            <img src="../media/Select-bro.svg" alt="Carte" />
          </div>
          <div class="caption">Et Beaucoup plus d'autres fonctionnalités.</div>
        </div>
      </div>
    </section>

    <section class="Conseils-Rendev">
      <h1>Le centre de dialyse est ouvert tous les jours 24h/7j</h1>
      <div class="renseignement" id="renseignement">
        <div class="Appel">
          <h2>Appelez-nous</h2>
          <img src="../media/phone-call.svg" alt="call-us" />
          <p>+213 559 333 333</p>
        </div>
        <!--SLIDE SHOW CONSEILS-->
        <div class="container-slide">
          <div
            id="carouselContent"
            class="carousel carousel-dark slide"
            data-ride="carousel"
          >
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active text-center p-4">
                <p>
                  Notre centre de dialyse assure le diagnostic et le traitement
                  des maladies des reins et propose des consultations
                  néphrologiques.
                </p>
              </div>
              <div class="carousel-item text-center p-4">
                <p>
                  Les consultations de néphrologie visent à prévenir,
                  diagnostiquer et soigner les maladies des reins et sont
                  assurées par des médecins néphrologues.
                </p>
              </div>
              <div class="carousel-item text-center p-4">
                <p>
                  un espace entièrement climatisé et adapté aux personnes
                  handicapées, les patients sont installés confortablement dans
                  un lit.
                </p>
              </div>
              <div class="carousel-item text-center p-4">
                <p>
                  16 postes de dialyse dotés de générateurs homologués pour
                  l’hémodiafiltration, de marque Baxter et Fresenius
                </p>
              </div>
              <div class="carousel-item text-center p-4">
                <p>
                  un système de traitement de l’eau par double osmose en série
                  offre une eau ultra pure
                </p>
              </div>
              <div class="carousel-item text-center p-4">
                <p>
                  des box individuels sont disponibles pour les patients les
                  plus fragiles.
                </p>
              </div>
              <div class="carousel-item text-center p-4">
                <p>
                  La mise à disposition gratuite de la télévision permet aux
                  patients de passer une séance plus agréable.
                </p>
              </div>
              <div class="carousel-item text-center p-4">
                <p>
                  Les patients peuvent être pris en charge par une diététicienne
                  et peuvent bénéficier d’un entretien avec une psychologue de
                  l’hôpital.
                </p>
              </div>
            </div>
            <button
              class="carousel-control-prev"
              type="button"
              data-bs-target="#carouselContent"
              data-bs-slide="prev"
            >
              <span
                class="carousel-control-prev-icon"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button
              class="carousel-control-next"
              type="button"
              data-bs-target="#carouselContent"
              data-bs-slide="next"
            >
              <span
                class="carousel-control-next-icon"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
        <!--RENDEEEEV-->
        <div class="Rendez-vous">
          <h2>Prenez Rendez-vous</h2>
          <p>vous devez vous connecter pour la prise des rendez-vous</p>
          <a href="../../src/PageSignUp.php?Error=0&Page" class="Rendez-vous-btn">Rendez-vous</a>
        </div>
      </div>
    </section>

    <section class="contact" id="contact">
      <h1>Contactez-nous</h1>
      <div class="container-contact">
        <div class="contact-fields">
          <form action="HomePage_inc.php" class="Contact-form" method="post">
            <label for="Nom">Nom:</label>
            <br />
            <input type="text" id="Nom" name="Nom" required/>
            <br />
            <label for="Prénom">Prénom:</label>
            <br />
            <input type="text" id="Prénom" name="Prénom" required/>
            <br />
            <label for="E-Mail">E-Mail:</label>
            <br />
            <input type="email" id="E-Mail" name="E-Mail" required/>
            <br />
            <label for="message">Message:</label>
            <br />
            <textarea
              name="Message"
              id="message"
              cols="30"
              rows="5"
              required></textarea>
            <br />
            <?php
          if(isset($_GET['Msg'])){
            if($_GET['Msg']=="Send"){
              ?>
              <p class="Sent">Votre message a été envoyé avec succés</p>
              
              <?php
            }
          }
          
          ?>
            <button type="submit" name="Envoyer" class="Envoyer-Message">Envoyer</button>
          
          </form>
          
        </div>
      </div>
    </section>
    <footer>
      <div class="foot1">
        <h1 href="#" class="logo">Dialyse<span>Center</span></h1>
        <h1 class="coo">Coordonnées</h1>
        <p>Centre de dialyse - Alger</p>
        <p class="courriel">
          <span>E-mail recrutement:</span>
          DialyseCenterpro.recrutement@gmail.com
        </p>
        <p class="courriel">
          <span>E-mail Contact:</span> DialyseCenterpro.patients@gmail.com
        </p>
        <p class="Ntel"><span>NTel:</span> +213 559 333 333</p>
        <p class="Fax"><span>Fax:</span> +213 (0) 21 24 79 04</p>
        <div class="social-media">
          <a href="#"><img src="../media/Facebook.svg" alt="facebook" /></a>
          <a href="#"><img src="../media/twitter.svg" alt="twitter" /></a>
          <a href="#"><img src="../media/Instagram.svg" alt="instagram" /></a>
        </div>
      </div>

      <div class="foot2">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d102295.65714232659!2d3.1526596651423144!3d36.75282857607684!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x128e4e1a545146e3%3A0xcb4c0d51eabe86df!2sBordj%20El%20Kiffan!5e0!3m2!1sfr!2sdz!4v1618673182721!5m2!1sfr!2sdz"
          width="600"
          height="450"
          style="border: 0"
          allowfullscreen=""
          loading="lazy"
        ></iframe>
      </div>
    </footer>

    
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
      crossorigin="anonymous"
    ></script>
    <script type="application/javascript" src="../js/script.js?v=55"></script>
  </body>
</html>
