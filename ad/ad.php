<?php

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>ad</title>
    <link rel='stylesheet' href='add.css'/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  </head>
  <body>
    <header>
      <a class="back-btn" href="/">< Nazad</a>
      <h1>Title</h1>
      <div class="logo">
        <a href="/">Zaposlise.net</a>
      </div>
    </header>

    <div class="page-content">
      <div class="employer-details-container">
        <h2 class="employer-details-title">Poslodavac</h2>
        <img class="employer-photo" src="https://www.colorhexa.com/c4c4c4.png" alt="Slika poslodavca">
        <div class="employer-details">
          <h3 class="employer-details-text">Ime firme</h3>
          <h3 class="employer-details-text">Adresa</h3>
          <h3 class="employer-details-text">Kontakt broj</h3>
        </div>
      </div>
      <div class="ad-details-container">
        <div class="first-container">
          <div class="address-container">
            <img class="address-logo" src="/images/icon-location.svg" alt="Logo adrese">
            <span class="address-text-city"> GRAD, ŽUPANIJA <br> </span>
          </div>
          <span class="address-text-street">Ulica <br> </span>
          <div class="ad-category">
            <span class="ad-category-text">KATEGORIJA</span>
          </div>
        </div>
        <div class="second-container">
          <span class="application-deadline-text">PRIJAVE DO DD/MM/YYYY <br></span>
          <button type='button' aria-label='Pritisnuti za prijavu'
            class='button-apply'>PRIJAVI SE
          </button>
        </div>
        <div class="ad-description-container">
          <h2 class="ad-description-title">Opis posla</h2>
          <p class="ad-description-text">From your account dashboard you can view your <br>
            recent orders, manage your shipping and billing <br> addresses, and edit 
            your password and account details.</p>
          <p class="fee-text"> Naknada: 30 kn/h</p>
        </div>
      </div>
    </div>

    <footer>
      <div class='footer-info'>
        <a class="footer-logo" href="/">Zaposlise.net</a>
        <div class='footer-info-links'>
           <a aria-label="Pritisnuti za više informacija o nama" href="/">O nama</a>
           <a aria-label="Pritisnuti za kontaktiranje" href="/">Kontakt</a></li>
           <a aria-label="Pritisnuti za pomoć" href="#">Pomoć</a>
         </ul>
        </div>
     </div>

     <div class="footer-social-privacy">
       <div class="footer-social">
         <a href='/'>
           <img src='../images/icon-instagram.svg' aria-label="Pritisnuti za
           otvaranje Instagram profila"
           alt='Instagram logo' loading = 'lazy'>
         </a>
         <a href='/'>
           <img src='../images/icon-twitter.svg' alt='Twitter logo'
           aria-label="Pritisnuti za otvaranje Twitter profila"
           loading = 'lazy'>
         </a>
         <a href='/'>
           <img src='../images/icon-facebook.svg' alt='Facebook logo'
           aria-label="Pritisnuti za otvaranje Facebook profila"
           loading = 'lazy'>
         </a>
       </div>

       <div class="footer-privacy">
         <a aria-label="Pritisnuti za otvaranje police privatnosti" href='/'>Polica privatnosti</a>
         <a aria-label="Pritisnuti za otvaranje uvjeta korištenja" href='/'>Uvjeti korištenja</a></li>
         <a href='/'>@ 2021 zaposlise.net</a>
       </div>
     </div>
    </footer>

    <script type="text/javascript">

    </script>
  </body>
</html>
